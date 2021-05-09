--
-- PostgreSQL database dump
--

-- Dumped from database version 10.16
-- Dumped by pg_dump version 10.16

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: about; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.about AS ENUM (
    'Pending',
    'Checked'
);


ALTER TYPE public.about OWNER TO postgres;

--
-- Name: role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.role AS ENUM (
    'Author',
    'Admin'
);


ALTER TYPE public.role OWNER TO postgres;

--
-- Name: status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.status AS ENUM (
    '0',
    '1',
    '-1'
);


ALTER TYPE public.status OWNER TO postgres;

--
-- Name: typ; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.typ AS ENUM (
    'multiple',
    'single',
    'open'
);


ALTER TYPE public.typ OWNER TO postgres;

--
-- Name: type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.type AS ENUM (
    'M',
    'S',
    'O'
);


ALTER TYPE public.type OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: answers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.answers (
    id integer NOT NULL,
    ques_id integer,
    answer text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.answers OWNER TO postgres;

--
-- Name: answers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.answers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.answers_id_seq OWNER TO postgres;

--
-- Name: answers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.answers_id_seq OWNED BY public.answers.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    category text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: chat; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.chat (
    id integer NOT NULL,
    from_id integer,
    to_id integer,
    message text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.chat OWNER TO postgres;

--
-- Name: chat_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.chat_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.chat_id_seq OWNER TO postgres;

--
-- Name: chat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.chat_id_seq OWNED BY public.chat.id;


--
-- Name: examsbyuser; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.examsbyuser (
    id integer NOT NULL,
    user_id integer,
    name text NOT NULL,
    questionaire text,
    status public.about DEFAULT 'Pending'::public.about,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.examsbyuser OWNER TO postgres;

--
-- Name: examsbyuser_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.examsbyuser_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.examsbyuser_id_seq OWNER TO postgres;

--
-- Name: examsbyuser_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.examsbyuser_id_seq OWNED BY public.examsbyuser.id;


--
-- Name: interests; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.interests (
    id integer NOT NULL,
    user_id integer,
    name text DEFAULT 'Development'::text,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.interests OWNER TO postgres;

--
-- Name: interests_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.interests_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.interests_id_seq OWNER TO postgres;

--
-- Name: interests_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.interests_id_seq OWNED BY public.interests.id;


--
-- Name: options; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.options (
    id integer NOT NULL,
    ques_id integer,
    option text NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.options OWNER TO postgres;

--
-- Name: options_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.options_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.options_id_seq OWNER TO postgres;

--
-- Name: options_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.options_id_seq OWNED BY public.options.id;


--
-- Name: questionaire; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questionaire (
    id integer NOT NULL,
    name text NOT NULL,
    ques_id integer,
    category text NOT NULL,
    timelimit integer NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.questionaire OWNER TO postgres;

--
-- Name: questionaire_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questionaire_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questionaire_id_seq OWNER TO postgres;

--
-- Name: questionaire_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questionaire_id_seq OWNED BY public.questionaire.id;


--
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questions (
    id integer NOT NULL,
    question text NOT NULL,
    category text NOT NULL,
    status public.status DEFAULT '0'::public.status,
    type public.typ NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.questions OWNER TO postgres;

--
-- Name: questions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questions_id_seq OWNER TO postgres;

--
-- Name: questions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questions_id_seq OWNED BY public.questions.id;


--
-- Name: solutionsbyuser; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.solutionsbyuser (
    id integer NOT NULL,
    exam_id integer,
    solution text NOT NULL,
    type public.typ,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.solutionsbyuser OWNER TO postgres;

--
-- Name: solutionsbyuser_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.solutionsbyuser_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.solutionsbyuser_id_seq OWNER TO postgres;

--
-- Name: solutionsbyuser_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.solutionsbyuser_id_seq OWNED BY public.solutionsbyuser.id;


--
-- Name: userprofile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.userprofile (
    id integer NOT NULL,
    user_id integer,
    firstname character varying(20) NOT NULL,
    lastname character varying(20) NOT NULL,
    phone integer NOT NULL,
    profile_pic character varying(60) DEFAULT 'demo.jpg'::character varying,
    bio text DEFAULT 'NA'::text,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone,
    category text DEFAULT 'Development'::text NOT NULL
);


ALTER TABLE public.userprofile OWNER TO postgres;

--
-- Name: userprofile_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.userprofile_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.userprofile_id_seq OWNER TO postgres;

--
-- Name: userprofile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.userprofile_id_seq OWNED BY public.userprofile.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    role public.role DEFAULT 'Author'::public.role,
    password character varying(255) NOT NULL,
    status public.status DEFAULT '0'::public.status,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: answers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.answers ALTER COLUMN id SET DEFAULT nextval('public.answers_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Name: chat id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat ALTER COLUMN id SET DEFAULT nextval('public.chat_id_seq'::regclass);


--
-- Name: examsbyuser id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examsbyuser ALTER COLUMN id SET DEFAULT nextval('public.examsbyuser_id_seq'::regclass);


--
-- Name: interests id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.interests ALTER COLUMN id SET DEFAULT nextval('public.interests_id_seq'::regclass);


--
-- Name: options id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options ALTER COLUMN id SET DEFAULT nextval('public.options_id_seq'::regclass);


--
-- Name: questionaire id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionaire ALTER COLUMN id SET DEFAULT nextval('public.questionaire_id_seq'::regclass);


--
-- Name: questions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions ALTER COLUMN id SET DEFAULT nextval('public.questions_id_seq'::regclass);


--
-- Name: solutionsbyuser id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solutionsbyuser ALTER COLUMN id SET DEFAULT nextval('public.solutionsbyuser_id_seq'::regclass);


--
-- Name: userprofile id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile ALTER COLUMN id SET DEFAULT nextval('public.userprofile_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: answers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.answers (id, ques_id, answer, created_at, updated_at) FROM stdin;
2	2	LI	2021-05-06 21:45:08.020404	\N
1	1	he	2021-05-06 21:02:01.610405	2021-05-07 11:27:47.704403
3	3	Yes	2021-05-07 11:33:46.997939	\N
4	4	LI	2021-05-07 11:34:31.820368	\N
6	6	Yes	2021-05-07 17:21:30.92789	\N
7	7	savsf	2021-05-08 15:39:53.95203	\N
9	9	Internet of things	2021-05-09 16:11:35.836799	\N
10	10	Internet of things	2021-05-09 16:11:35.847398	\N
11	11	Internet of things	2021-05-09 16:11:35.857838	\N
12	12	Internet of things	2021-05-09 16:16:17.817736	\N
13	13	Internet of things	2021-05-09 16:16:17.829862	\N
14	14	Internet of things	2021-05-09 16:16:17.838978	\N
15	16	Internet of things	2021-05-09 16:21:52.974717	\N
16	17	Internet of things	2021-05-09 16:21:52.981182	\N
17	18	Internet of things	2021-05-09 16:21:52.987049	\N
18	19	Internet of things	2021-05-09 16:26:15.20895	\N
5	5	Internet of things	2021-05-07 11:35:26.50847	2021-05-09 16:43:48.84959
8	8	time	2021-05-08 17:14:03.806103	2021-05-09 16:52:52.787111
21	22	time	2021-05-09 16:54:53.683097	\N
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, category, created_at, updated_at) FROM stdin;
1	Development	2021-05-06 17:37:28.017509	\N
2	Competitive Programming	2021-05-06 17:37:28.017509	\N
3	Languages	2021-05-06 17:37:28.017509	\N
4	Competitive Exams	2021-05-06 17:37:28.017509	\N
11	Workout	2021-05-07 17:20:58.035069	\N
\.


--
-- Data for Name: chat; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.chat (id, from_id, to_id, message, created_at, updated_at) FROM stdin;
1	1	2	Hey Whatsupp!!	2021-05-04 12:21:04.133407	\N
2	2	1	Playing Games!!	2021-05-04 12:54:49.171492	\N
3	1	2	Great man!!	2021-05-04 13:03:02.076361	\N
4	1	2	There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.	2021-05-04 13:12:47.897936	\N
5	1	2	hello	2021-05-04 17:59:01.196329	\N
6	1	2	hello	2021-05-04 17:59:27.210028	\N
7	1	2	hello	2021-05-04 18:00:06.925767	\N
8	1	2	how are you	2021-05-04 18:00:58.23883	\N
9	1	2	what are you doing ?	2021-05-04 18:02:38.975352	\N
10	1	2	where are you ?	2021-05-04 18:03:26.565803	\N
11	1	2	hello ?	2021-05-04 18:06:14.976283	\N
12	1	2	Are you there ?	2021-05-04 18:09:47.092693	\N
13	1	2	hello	2021-05-04 18:11:45.461193	\N
14	1	2	hello	2021-05-04 18:12:07.855752	\N
15	1	2	hello	2021-05-04 18:12:25.672061	\N
16	1	2	hello	2021-05-04 18:13:20.872552	\N
17	1	2		2021-05-04 18:13:48.375157	\N
18	1	2	hello	2021-05-04 18:16:52.24793	\N
19	1	2		2021-05-04 18:17:37.643819	\N
20	1	2		2021-05-04 18:17:57.917868	\N
21	1	2		2021-05-04 18:19:48.970029	\N
22	1	2		2021-05-04 18:20:23.117689	\N
23	1	2		2021-05-04 18:21:28.961886	\N
24	1	2		2021-05-04 18:21:50.689346	\N
25	1	2		2021-05-04 18:22:25.249228	\N
26	1	2		2021-05-04 18:22:44.401508	\N
27	1	2		2021-05-04 18:23:24.864332	\N
28	1	2		2021-05-04 18:23:46.070562	\N
29	1	2		2021-05-04 18:25:12.276761	\N
30	1	2	hello	2021-05-04 18:30:52.003394	\N
31	1	2	hello	2021-05-04 18:31:36.920168	\N
32	1	2	hello	2021-05-04 18:31:55.634183	\N
33	1	2	hello	2021-05-04 18:36:22.989366	\N
34	1	2	hello	2021-05-04 18:36:29.123119	\N
35	1	2		2021-05-04 18:38:51.003174	\N
36	2	2	hello	2021-05-04 18:39:08.210395	\N
37	2	2	hello	2021-05-04 18:39:26.171765	\N
38	2	2	hello	2021-05-04 18:43:40.551654	\N
39	2	2	hello	2021-05-04 19:06:39.45494	\N
40	2	2		2021-05-05 09:37:04.264224	\N
41	2	2		2021-05-05 09:37:07.784772	\N
42	2	2		2021-05-05 09:37:15.47516	\N
43	2	2		2021-05-05 09:38:00.336839	\N
44	5	2	hello	2021-05-05 10:51:15.697055	\N
45	1	2	hello	2021-05-05 16:20:47.050469	\N
46	1	2		2021-05-05 16:45:15.820528	\N
47	1	2		2021-05-05 16:45:17.78436	\N
48	1	2		2021-05-05 16:45:18.829223	\N
49	1	2		2021-05-05 16:45:20.734995	\N
50	1	2		2021-05-05 16:46:02.74944	\N
51	1	2		2021-05-05 16:48:57.370114	\N
52	1	2		2021-05-05 16:49:18.853837	\N
53	1	2		2021-05-05 16:50:04.398184	\N
54	1	2		2021-05-05 16:50:27.512476	\N
55	1	2		2021-05-05 16:51:10.529806	\N
56	1	2		2021-05-05 16:52:05.981613	\N
57	1	2		2021-05-05 16:52:07.669037	\N
58	1	2		2021-05-05 17:00:00.313865	\N
59	1	2		2021-05-05 17:00:05.30704	\N
60	1	2		2021-05-05 17:00:17.249053	\N
61	1	2		2021-05-05 17:00:18.972614	\N
62	1	2		2021-05-05 17:00:55.389712	\N
63	1	2	hello	2021-05-05 18:20:26.882528	\N
64	1	2	hello	2021-05-06 12:21:53.937681	\N
65	1	2	Hi new	2021-05-06 12:28:26.882718	\N
66	1	2	hello new	2021-05-06 12:29:35.208343	\N
67	1	2	New	2021-05-06 12:30:17.83857	\N
68	2	2	hello	2021-05-06 12:31:07.908104	\N
69	1	2	What are you doing buddy ?	2021-05-06 12:32:30.810983	\N
70	1	5	hello Ravi	2021-05-06 15:59:35.646391	\N
71	5	1	hello	2021-05-06 16:00:17.157174	\N
72	1	5	What are you doing ?	2021-05-06 16:02:07.505669	\N
73	1	5		2021-05-06 16:28:47.594817	\N
74	1	5		2021-05-06 16:28:57.110053	\N
75	1	2		2021-05-06 16:29:30.226571	\N
76	1	2		2021-05-06 16:29:49.22802	\N
77	1	6		2021-05-06 16:31:06.483849	\N
78	1	6	hello	2021-05-06 16:40:51.869638	\N
79	1	2	hello	2021-05-06 16:40:56.677355	\N
80	1	5	hello	2021-05-06 16:41:01.15185	\N
81	1	8		2021-05-07 11:39:23.228131	\N
82	1	2		2021-05-07 11:39:33.550144	\N
83	1	8	hello	2021-05-07 11:44:23.907625	\N
84	1	8	hello	2021-05-07 15:58:13.63429	\N
85	1	8	hello	2021-05-07 17:20:08.254892	\N
86	8	1	hi	2021-05-08 15:53:02.669634	\N
87	1	5	hello	2021-05-09 17:09:26.869564	\N
\.


--
-- Data for Name: examsbyuser; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.examsbyuser (id, user_id, name, questionaire, status, created_at, updated_at) FROM stdin;
11	8	stu	Test	Pending	2021-05-09 15:45:50.161658	\N
10	8	stu	Develop	Checked	2021-05-09 15:42:07.024507	2021-05-09 15:47:16.508405
\.


--
-- Data for Name: interests; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.interests (id, user_id, name, created_at, updated_at) FROM stdin;
1	7	Development	2021-05-06 14:29:24.127382	2021-05-06 14:58:58.762208
3	2	Development	2021-05-06 16:39:24.989966	\N
5	6	Development	2021-05-06 16:39:24.989966	\N
4	5	Languages	2021-05-06 16:39:24.989966	2021-05-06 16:40:21.323948
2	1	Competitive Programming	2021-05-06 16:39:24.989966	2021-05-07 17:30:06.859492
6	8	Development	2021-05-07 11:06:58.05523	2021-05-08 15:52:14.221381
\.


--
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.options (id, ques_id, option, created_at, updated_at) FROM stdin;
5	2		2021-05-06 21:45:07.995876	\N
6	2		2021-05-06 21:45:08.006221	\N
7	2		2021-05-06 21:45:08.011605	\N
8	2		2021-05-06 21:45:08.016553	\N
1	1	those	2021-05-06 21:02:01.592464	2021-05-07 11:27:47.701791
9	3		2021-05-07 11:33:46.976007	\N
10	3		2021-05-07 11:33:46.982393	\N
11	3		2021-05-07 11:33:46.987888	\N
12	3		2021-05-07 11:33:46.992894	\N
13	4		2021-05-07 11:34:31.802941	\N
14	4		2021-05-07 11:34:31.809722	\N
15	4		2021-05-07 11:34:31.814733	\N
16	4		2021-05-07 11:34:31.817588	\N
17	5		2021-05-07 11:35:26.489575	\N
18	5		2021-05-07 11:35:26.495578	\N
19	5		2021-05-07 11:35:26.500515	\N
20	5		2021-05-07 11:35:26.505613	\N
21	6		2021-05-07 17:21:30.903311	\N
22	6		2021-05-07 17:21:30.909988	\N
23	6		2021-05-07 17:21:30.915402	\N
24	6		2021-05-07 17:21:30.922109	\N
25	7	She	2021-05-08 15:39:53.928384	\N
26	7	They	2021-05-08 15:39:53.936723	\N
27	7	Them	2021-05-08 15:39:53.942263	\N
28	7	those	2021-05-08 15:39:53.947107	\N
29	8		2021-05-08 17:14:03.7904	\N
30	8		2021-05-08 17:14:03.797648	\N
31	8		2021-05-08 17:14:03.800569	\N
32	8		2021-05-08 17:14:03.803327	\N
2	1	those	2021-05-06 21:02:01.59904	2021-05-06 23:36:06.615156
3	1	those	2021-05-06 21:02:01.603892	2021-05-06 23:36:06.615156
4	1	those	2021-05-06 21:02:01.607574	2021-05-06 23:36:06.615156
\.


--
-- Data for Name: questionaire; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.questionaire (id, name, ques_id, category, timelimit, created_at, updated_at) FROM stdin;
1	Ujjawal Sharma	2	Development	20	2021-05-07 10:56:02.429829	\N
2	Ujjawal Sharma	1	Development	20	2021-05-07 10:56:02.44063	\N
3	avc	2	Competitive Programming	20	2021-05-07 11:31:53.480174	\N
4	avc	1	Competitive Programming	20	2021-05-07 11:31:53.49231	\N
5	avs	1	Competitive Programming	20	2021-05-07 11:38:31.374306	\N
6	avs	3	Competitive Programming	20	2021-05-07 11:38:31.386052	\N
7	avs	4	Competitive Programming	20	2021-05-07 11:38:31.392073	\N
8	avs	5	Competitive Programming	20	2021-05-07 11:38:31.396089	\N
9	Test	7	Development	20	2021-05-08 15:51:45.108657	\N
10	New Test	1	Development	20	2021-05-08 17:12:56.98348	\N
11	New Test	4	Development	20	2021-05-08 17:12:56.991058	\N
12	New Test	7	Development	20	2021-05-08 17:12:56.995112	\N
13	New 	8	Development	20	2021-05-08 17:14:21.050166	\N
14	New 	1	Development	20	2021-05-08 17:14:21.060137	\N
15	New 	4	Development	20	2021-05-08 17:14:21.063157	\N
16	New 	7	Development	20	2021-05-08 17:14:21.065894	\N
17	Develop	8	Development	20	2021-05-08 17:15:11.77439	\N
18	Develop	1	Development	20	2021-05-08 17:15:11.78229	\N
19	Develop	4	Development	20	2021-05-08 17:15:11.78631	\N
20	Develop	7	Development	20	2021-05-08 17:15:11.789382	\N
21	Auto submit	7	Development	1	2021-05-09 15:19:20.075323	\N
\.


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.questions (id, question, category, status, type, created_at, updated_at) FROM stdin;
2	In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.?	Competitive Exams	-1	single	2021-05-06 21:45:07.989795	2021-05-08 15:50:53.844372
6	What is ajsnmc bAMSC ?	Development	-1	single	2021-05-07 17:21:30.895533	2021-05-08 15:51:06.12438
3	Type of d ?\r\n	Development	-1	single	2021-05-07 11:33:46.97007	2021-05-08 15:51:14.291893
19	What is IOT	development	0	open	2021-05-09 16:26:15.202404	\N
16	What is IOT	development	-1	open	2021-05-09 16:21:52.968197	2021-05-09 16:26:34.530892
10		development	-1	open	2021-05-09 16:11:35.841844	2021-05-09 16:26:41.782775
11		development	-1	open	2021-05-09 16:11:35.852702	2021-05-09 16:26:49.284242
18		development	-1	open	2021-05-09 16:21:52.984021	2021-05-09 16:27:01.745897
13		development	-1	open	2021-05-09 16:16:17.824487	2021-05-09 16:27:07.037945
14		development	-1	open	2021-05-09 16:16:17.834826	2021-05-09 16:27:14.182597
9	What is IOT	development	-1	open	2021-05-09 16:11:35.833093	2021-05-09 16:27:19.318919
17		development	-1	open	2021-05-09 16:21:52.978234	2021-05-09 16:27:24.798486
12	What is IOT	development	-1	open	2021-05-09 16:16:17.812287	2021-05-09 16:28:00.842939
5	What is IOT	development	-1	open	2021-05-07 11:35:26.480792	2021-05-09 16:43:48.843992
8	New question ?	languages	0	open	2021-05-08 17:14:03.783106	2021-05-09 16:52:52.781125
22	question ?	languages	0	open	2021-05-09 16:54:53.678912	\N
1	What is this?	Competitive Programming	0	multiple	2021-05-06 21:02:01.585647	2021-05-07 11:31:38.560308
4	That	Languages	0	open	2021-05-07 11:34:31.791477	\N
7	Hello ?	Development	0	single	2021-05-08 15:39:53.918997	\N
\.


--
-- Data for Name: solutionsbyuser; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.solutionsbyuser (id, exam_id, solution, type, created_at, updated_at) FROM stdin;
7	10	hello	open	2021-05-09 15:42:07.034477	\N
8	10	hi	open	2021-05-09 15:42:07.03904	\N
9	10	They	single	2021-05-09 15:42:07.044463	\N
10	10	 those	multiple	2021-05-09 15:42:07.049903	\N
11	10	 those	multiple	2021-05-09 15:42:07.055353	\N
12	10	They	single	2021-05-09 15:45:50.169759	\N
\.


--
-- Data for Name: userprofile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.userprofile (id, user_id, firstname, lastname, phone, profile_pic, bio, created_at, updated_at, category) FROM stdin;
3	2	new	new	123	demo.jpg	NA	2021-05-06 11:54:28.479177	\N	Development
4	6	ravi	user	123	demo.jpg	NA	2021-05-06 14:28:15.762014	\N	Development
5	7	user	user	123	demo.jpg	NA	2021-05-06 14:29:24.1236	2021-05-06 14:58:58.759054	Development
1	5	Ravi	mishra	124		NA	2021-05-05 10:50:39.082267	2021-05-06 16:40:21.317905	Development
2	1	Ujjawal	Sharma	123	demo.jpg	NA	2021-05-06 11:54:04.313761	2021-05-07 17:30:06.854327	Development
6	8	Student	user	123	demo.jpg	NA	2021-05-07 11:06:58.044181	2021-05-08 15:52:14.215677	Development
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, email, role, password, status, created_at, updated_at) FROM stdin;
2	new	new@xyz	Author	123	0	2021-05-04 12:19:05.08772	2021-05-06 16:40:08.609092
5	Ravi	ravi@xyz	Author	123	0	2021-05-05 10:50:39.066128	2021-05-06 16:40:21.31159
7	User	user@xyz	Author	123	0	2021-05-06 14:29:24.117969	2021-05-07 11:30:25.013613
6	RAVIIII	ujjawalsharma@ameyo.com	Author	123	0	2021-05-06 14:28:15.754897	2021-05-07 11:30:30.62918
1	Ujjawal	ujjawal@xyz	Admin	123	0	2021-05-04 09:10:12.128806	2021-05-07 17:30:06.844124
8	stu	abs@m.com	Author	123	0	2021-05-07 11:06:58.03913	2021-05-08 15:52:14.209427
\.


--
-- Name: answers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.answers_id_seq', 21, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 11, true);


--
-- Name: chat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.chat_id_seq', 87, true);


--
-- Name: examsbyuser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.examsbyuser_id_seq', 11, true);


--
-- Name: interests_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.interests_id_seq', 6, true);


--
-- Name: options_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.options_id_seq', 32, true);


--
-- Name: questionaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questionaire_id_seq', 21, true);


--
-- Name: questions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questions_id_seq', 22, true);


--
-- Name: solutionsbyuser_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.solutionsbyuser_id_seq', 12, true);


--
-- Name: userprofile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.userprofile_id_seq', 6, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 8, true);


--
-- Name: answers answers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.answers
    ADD CONSTRAINT answers_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: chat chat_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT chat_pkey PRIMARY KEY (id);


--
-- Name: examsbyuser examsbyuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examsbyuser
    ADD CONSTRAINT examsbyuser_pkey PRIMARY KEY (id);


--
-- Name: interests interests_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.interests
    ADD CONSTRAINT interests_pkey PRIMARY KEY (id);


--
-- Name: options options_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT options_pkey PRIMARY KEY (id);


--
-- Name: questionaire questionaire_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionaire
    ADD CONSTRAINT questionaire_pkey PRIMARY KEY (id);


--
-- Name: questions questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);


--
-- Name: solutionsbyuser solutionsbyuser_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solutionsbyuser
    ADD CONSTRAINT solutionsbyuser_pkey PRIMARY KEY (id);


--
-- Name: userprofile userprofile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile
    ADD CONSTRAINT userprofile_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: examsbyuser fk_examsbyuser; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examsbyuser
    ADD CONSTRAINT fk_examsbyuser FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: chat fk_message; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat
    ADD CONSTRAINT fk_message FOREIGN KEY (from_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: questionaire fk_questionaire; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionaire
    ADD CONSTRAINT fk_questionaire FOREIGN KEY (ques_id) REFERENCES public.questions(id) ON DELETE CASCADE;


--
-- Name: options fk_questions; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT fk_questions FOREIGN KEY (ques_id) REFERENCES public.questions(id) ON DELETE CASCADE;


--
-- Name: answers fk_questions; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.answers
    ADD CONSTRAINT fk_questions FOREIGN KEY (ques_id) REFERENCES public.questions(id) ON DELETE CASCADE;


--
-- Name: solutionsbyuser fk_solutionsbyuser; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.solutionsbyuser
    ADD CONSTRAINT fk_solutionsbyuser FOREIGN KEY (exam_id) REFERENCES public.examsbyuser(id) ON DELETE CASCADE;


--
-- Name: userprofile fk_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile
    ADD CONSTRAINT fk_user FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: interests fk_users; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.interests
    ADD CONSTRAINT fk_users FOREIGN KEY (user_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

