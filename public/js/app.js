function request({ verb = 'GET', url, data, isParseJsonNeeded = true, timeout = 0, fileUpload = false, isJsonHeaderNeeded = true }, xhr = null) {
    return new Promise((resolve, reject) => {
        if (!xhr || !(xhr instanceof XMLHttpRequest)) {
            xhr = new XMLHttpRequest()
        }
        xhr.onload = () => {
            if (xhr.status === 200) {
                resolve(isParseJsonNeeded ? JSON.parse(xhr.responseText) : data)
            } else {
                reject(
                    JSON.stringify({
                        status: xhr.status,
                        statusText: xhr.statusText,
                        data: xhr.responseText
                    })
                )
            }
        }
        xhr.onerror = () => {
            const errorMsg =
                'Error executing this action, please check your internet connection.'
            reject(errorMsg)
        }
        xhr.open(verb, url)
        if (timeout) {
            xhr.ontimeout = () => {
                const errorMsg =
                    'Error executing this action, please check your internet connection.'
                reject(errorMsg)
            }
            xhr.timeout = timeout
        }
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
        if (isJsonHeaderNeeded && !fileUpload) {
            xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8')
        }

        if (fileUpload && data?.file) {
            xhr.setRequestHeader('Accept', 'application/json')
            const formData = new FormData()
            formData.append('file', data.file)
            if (data.metadata) {
                formData.append('metadata', JSON.stringify(data.metadata))
            }
            if (data.extraData) {
                const keys = Object.keys(data.extraData)
                keys.forEach(key => {
                    formData.append(key, data.extraData[key])
                })
            }
            xhr.send(formData)
            return
        }

        if (data) {
            data = isJsonHeaderNeeded ? JSON.stringify(data) : data
            xhr.send(data)
        } else {
            xhr.send()
        }
    })
}

new Vue({
    el: '#challengeapp',
    data: {
        fromAirFlyings: [],
        toAirFlyings: [],
        origenFly: '',
        destinyFly: '',
        beginDate: new Date(),
        endDate: new Date(),
        flyings: [],
    },
    mounted() {
        let url = '/airports'
        request({ verb: 'POST', url: url, data: {code: 'SFO'} })
            .then((response) => {
                if (response.result) {
                    this.fromAirFlyings = response.airports
                }
            })
            .catch((error) => {
                console.log(error)
            })

        request({ verb: 'POST', url: url, data: {code: 'NYC'} })
            .then((response) => {
                if (response.result) {
                    this.toAirFlyings = response.airports
                }
            })
            .catch((error) => {
                console.log(error)
            })
    },
    computed: {
    },
    methods: {
        getFromToFlyings: function() {
            let url = '/search'
            let data = {
                origen: this.origenFly,
                destiny: this.destinyFly,
                begin_date: this.beginDate,
                end_date: this.endDate,
            }

            request({ verb: 'POST', url: url, data: data })
                .then((response) => {
                    console.log(response)
                    if (response.result) {
                        this.flyings = response.flys
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    }
});