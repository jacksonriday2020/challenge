--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.1
-- Dumped by pg_dump version 9.4.1
-- Started on 2023-07-07 22:16:55

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

DROP DATABASE flying;
--
-- TOC entry 2026 (class 1262 OID 16393)
-- Name: flying; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE flying WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Spanish_Spain.1252' LC_CTYPE = 'Spanish_Spain.1252';


ALTER DATABASE flying OWNER TO postgres;

\connect flying

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 5 (class 2615 OID 2200)
-- Name: public; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA public;


ALTER SCHEMA public OWNER TO postgres;

--
-- TOC entry 2027 (class 0 OID 0)
-- Dependencies: 5
-- Name: SCHEMA public; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON SCHEMA public IS 'standard public schema';


--
-- TOC entry 178 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2029 (class 0 OID 0)
-- Dependencies: 178
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 173 (class 1259 OID 16396)
-- Name: flying; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE flying (
    id integer NOT NULL,
    origin_airport character varying(5),
    destiny_airport character varying(5),
    begin_at time without time zone,
    end_at time without time zone,
    cabin_class character varying(50),
    fly_cost numeric(10,2),
    airline character varying(255),
    begin_date date,
    end_date date,
    return_begin_at time without time zone,
    return_end_at time without time zone
);


ALTER TABLE flying OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16394)
-- Name: flying_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE flying_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE flying_id_seq OWNER TO postgres;

--
-- TOC entry 2030 (class 0 OID 0)
-- Dependencies: 172
-- Name: flying_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE flying_id_seq OWNED BY flying.id;


--
-- TOC entry 177 (class 1259 OID 16547)
-- Name: payment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE payment (
    id integer NOT NULL,
    user_public_information jsonb,
    payment_information jsonb,
    errors jsonb,
    user_id integer
);


ALTER TABLE payment OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16545)
-- Name: payment_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE payment_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE payment_id_seq OWNER TO postgres;

--
-- TOC entry 2031 (class 0 OID 0)
-- Dependencies: 176
-- Name: payment_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE payment_id_seq OWNED BY payment.id;


--
-- TOC entry 175 (class 1259 OID 16533)
-- Name: reservation; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE reservation (
    id integer NOT NULL,
    flying_id integer NOT NULL,
    created_at timestamp with time zone,
    status character varying(20),
    payment_id integer,
    canceled_at timestamp with time zone,
    user_id integer,
    passenger_count integer
);


ALTER TABLE reservation OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16531)
-- Name: reservation_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE reservation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE reservation_id_seq OWNER TO postgres;

--
-- TOC entry 2032 (class 0 OID 0)
-- Dependencies: 174
-- Name: reservation_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE reservation_id_seq OWNED BY reservation.id;


--
-- TOC entry 1894 (class 2604 OID 16399)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY flying ALTER COLUMN id SET DEFAULT nextval('flying_id_seq'::regclass);


--
-- TOC entry 1896 (class 2604 OID 16550)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY payment ALTER COLUMN id SET DEFAULT nextval('payment_id_seq'::regclass);


--
-- TOC entry 1895 (class 2604 OID 16536)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservation ALTER COLUMN id SET DEFAULT nextval('reservation_id_seq'::regclass);


--
-- TOC entry 2017 (class 0 OID 16396)
-- Dependencies: 173
-- Data for Name: flying; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO flying (id, origin_airport, destiny_airport, begin_at, end_at, cabin_class, fly_cost, airline, begin_date, end_date, return_begin_at, return_end_at) VALUES (1, 'SJC', 'HPN', '03:23:20', '09:23:20', 'Economic', 373.00, 'Delta', '2023-06-28', '2023-06-30', '10:50:00', '16:50:00');
INSERT INTO flying (id, origin_airport, destiny_airport, begin_at, end_at, cabin_class, fly_cost, airline, begin_date, end_date, return_begin_at, return_end_at) VALUES (3, 'SJC', 'ISP', '05:00:00', '11:00:00', 'Bussines', 500.00, 'JetBlue', '2023-06-29', '2023-06-30', '16:00:00', '00:00:00');
INSERT INTO flying (id, origin_airport, destiny_airport, begin_at, end_at, cabin_class, fly_cost, airline, begin_date, end_date, return_begin_at, return_end_at) VALUES (2, 'SJC', 'TEB', '10:30:00', '15:50:00', 'First', 600.00, 'Frontier', '2023-06-30', '2023-07-01', '20:00:00', '01:50:00');
INSERT INTO flying (id, origin_airport, destiny_airport, begin_at, end_at, cabin_class, fly_cost, airline, begin_date, end_date, return_begin_at, return_end_at) VALUES (4, 'SJC', 'HPN', '03:23:20', '09:23:20', 'Bussines', 400.00, 'Delta', '2023-06-28', '2023-06-30', '10:50:00', '16:50:00');
INSERT INTO flying (id, origin_airport, destiny_airport, begin_at, end_at, cabin_class, fly_cost, airline, begin_date, end_date, return_begin_at, return_end_at) VALUES (5, 'SJC', 'TEB', '10:30:00', '15:50:00', 'Economic', 300.00, 'Frontier', '2023-06-30', '2023-07-01', '20:00:00', '01:50:00');


--
-- TOC entry 2033 (class 0 OID 0)
-- Dependencies: 172
-- Name: flying_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('flying_id_seq', 5, true);


--
-- TOC entry 2021 (class 0 OID 16547)
-- Dependencies: 177
-- Data for Name: payment; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2034 (class 0 OID 0)
-- Dependencies: 176
-- Name: payment_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('payment_id_seq', 1, false);


--
-- TOC entry 2019 (class 0 OID 16533)
-- Dependencies: 175
-- Data for Name: reservation; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2035 (class 0 OID 0)
-- Dependencies: 174
-- Name: reservation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('reservation_id_seq', 1, false);


--
-- TOC entry 1904 (class 2606 OID 16555)
-- Name: payment_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY payment
    ADD CONSTRAINT payment_pk PRIMARY KEY (id);


--
-- TOC entry 1898 (class 2606 OID 16401)
-- Name: pk_flying; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY flying
    ADD CONSTRAINT pk_flying PRIMARY KEY (id);


--
-- TOC entry 1902 (class 2606 OID 16538)
-- Name: reservation_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY reservation
    ADD CONSTRAINT reservation_pk PRIMARY KEY (id);


--
-- TOC entry 1899 (class 1259 OID 16544)
-- Name: fki_reservation_flying_id_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_reservation_flying_id_fk ON reservation USING btree (flying_id);


--
-- TOC entry 1900 (class 1259 OID 16561)
-- Name: fki_reservation_payment_id_fk; Type: INDEX; Schema: public; Owner: postgres; Tablespace: 
--

CREATE INDEX fki_reservation_payment_id_fk ON reservation USING btree (payment_id);


--
-- TOC entry 1905 (class 2606 OID 16539)
-- Name: reservation_flying_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservation
    ADD CONSTRAINT reservation_flying_id_fk FOREIGN KEY (flying_id) REFERENCES flying(id) ON UPDATE CASCADE ON DELETE CASCADE DEFERRABLE INITIALLY DEFERRED;


--
-- TOC entry 1906 (class 2606 OID 16556)
-- Name: reservation_payment_id_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY reservation
    ADD CONSTRAINT reservation_payment_id_fk FOREIGN KEY (payment_id) REFERENCES payment(id) ON UPDATE CASCADE ON DELETE CASCADE DEFERRABLE INITIALLY DEFERRED;


--
-- TOC entry 2028 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2023-07-07 22:16:55

--
-- PostgreSQL database dump complete
--

