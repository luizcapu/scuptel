--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.9
-- Dumped by pg_dump version 9.3.9
-- Started on 2016-01-30 01:24:04 BRST

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 1997 (class 1262 OID 29816)
-- Name: scuptel; Type: DATABASE; Schema: -; Owner: root
--

CREATE DATABASE scuptel WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'pt_BR.UTF-8' LC_CTYPE = 'pt_BR.UTF-8';


ALTER DATABASE scuptel OWNER TO root;

\connect scuptel

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 174 (class 3079 OID 11791)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2000 (class 0 OID 0)
-- Dependencies: 174
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 170 (class 1259 OID 29817)
-- Name: ddd; Type: TABLE; Schema: public; Owner: root; Tablespace: 
--

CREATE TABLE ddd (
    ddd character varying(3) NOT NULL
);


ALTER TABLE public.ddd OWNER TO root;

--
-- TOC entry 173 (class 1259 OID 29839)
-- Name: plan; Type: TABLE; Schema: public; Owner: root; Tablespace: 
--

CREATE TABLE plan (
    plan_id integer NOT NULL,
    description character varying(50) NOT NULL,
    minutes integer NOT NULL,
    fare_additional_min integer NOT NULL
);


ALTER TABLE public.plan OWNER TO root;

--
-- TOC entry 172 (class 1259 OID 29837)
-- Name: plan_plan_id_seq; Type: SEQUENCE; Schema: public; Owner: root
--

CREATE SEQUENCE plan_plan_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_plan_id_seq OWNER TO root;

--
-- TOC entry 2001 (class 0 OID 0)
-- Dependencies: 172
-- Name: plan_plan_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: root
--

ALTER SEQUENCE plan_plan_id_seq OWNED BY plan.plan_id;


--
-- TOC entry 171 (class 1259 OID 29822)
-- Name: price; Type: TABLE; Schema: public; Owner: root; Tablespace: 
--

CREATE TABLE price (
    from_ddd character varying(3) NOT NULL,
    to_ddd character varying(3) NOT NULL,
    price_per_minute numeric(10,2) NOT NULL
);


ALTER TABLE public.price OWNER TO root;

--
-- TOC entry 1871 (class 2604 OID 29842)
-- Name: plan_id; Type: DEFAULT; Schema: public; Owner: root
--

ALTER TABLE ONLY plan ALTER COLUMN plan_id SET DEFAULT nextval('plan_plan_id_seq'::regclass);


--
-- TOC entry 1989 (class 0 OID 29817)
-- Dependencies: 170
-- Data for Name: ddd; Type: TABLE DATA; Schema: public; Owner: root
--

INSERT INTO ddd VALUES ('011');
INSERT INTO ddd VALUES ('016');
INSERT INTO ddd VALUES ('017');
INSERT INTO ddd VALUES ('018');


--
-- TOC entry 1992 (class 0 OID 29839)
-- Dependencies: 173
-- Data for Name: plan; Type: TABLE DATA; Schema: public; Owner: root
--

INSERT INTO plan VALUES (1, 'FaleMais 30', 30, 10);
INSERT INTO plan VALUES (2, 'FaleMais 60', 60, 10);
INSERT INTO plan VALUES (3, 'FaleMais 120', 120, 10);


--
-- TOC entry 2002 (class 0 OID 0)
-- Dependencies: 172
-- Name: plan_plan_id_seq; Type: SEQUENCE SET; Schema: public; Owner: root
--

SELECT pg_catalog.setval('plan_plan_id_seq', 3, true);


--
-- TOC entry 1990 (class 0 OID 29822)
-- Dependencies: 171
-- Data for Name: price; Type: TABLE DATA; Schema: public; Owner: root
--

INSERT INTO price VALUES ('011', '016', 1.90);
INSERT INTO price VALUES ('016', '011', 2.90);
INSERT INTO price VALUES ('011', '017', 1.70);
INSERT INTO price VALUES ('017', '011', 2.70);
INSERT INTO price VALUES ('011', '018', 0.90);
INSERT INTO price VALUES ('018', '011', 1.90);


--
-- TOC entry 1873 (class 2606 OID 29821)
-- Name: ddd_pk; Type: CONSTRAINT; Schema: public; Owner: root; Tablespace: 
--

ALTER TABLE ONLY ddd
    ADD CONSTRAINT ddd_pk PRIMARY KEY (ddd);


--
-- TOC entry 1877 (class 2606 OID 29846)
-- Name: plan_desc_uq; Type: CONSTRAINT; Schema: public; Owner: root; Tablespace: 
--

ALTER TABLE ONLY plan
    ADD CONSTRAINT plan_desc_uq UNIQUE (description);


--
-- TOC entry 1879 (class 2606 OID 29844)
-- Name: plan_pk; Type: CONSTRAINT; Schema: public; Owner: root; Tablespace: 
--

ALTER TABLE ONLY plan
    ADD CONSTRAINT plan_pk PRIMARY KEY (plan_id);


--
-- TOC entry 1875 (class 2606 OID 29826)
-- Name: price_pk; Type: CONSTRAINT; Schema: public; Owner: root; Tablespace: 
--

ALTER TABLE ONLY price
    ADD CONSTRAINT price_pk PRIMARY KEY (from_ddd, to_ddd);


--
-- TOC entry 1880 (class 2606 OID 29827)
-- Name: from_ddd_fk; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY price
    ADD CONSTRAINT from_ddd_fk FOREIGN KEY (from_ddd) REFERENCES ddd(ddd) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1881 (class 2606 OID 29832)
-- Name: to_ddd_fk; Type: FK CONSTRAINT; Schema: public; Owner: root
--

ALTER TABLE ONLY price
    ADD CONSTRAINT to_ddd_fk FOREIGN KEY (to_ddd) REFERENCES ddd(ddd) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 1999 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-01-30 01:24:04 BRST

--
-- PostgreSQL database dump complete
--

