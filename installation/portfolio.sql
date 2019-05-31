--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: admin; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA admin;


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: about; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.about (
    id_about integer NOT NULL,
    fullname_about character varying(120),
    birthday_about date,
    city_about character varying(100),
    email_about character varying(255),
    phone_about character varying(10),
    hobbies_about character varying(255),
    current_job_about character varying(100),
    description_about character varying(255),
    cv_path_about character varying(255)
);


--
-- Name: about_id_about_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.about_id_about_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: about_id_about_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.about_id_about_seq OWNED BY admin.about.id_about;


--
-- Name: contact; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.contact (
    id_contact integer NOT NULL,
    content_contact character varying(255)
);


--
-- Name: contact_id_contact_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.contact_id_contact_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: contact_id_contact_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.contact_id_contact_seq OWNED BY admin.contact.id_contact;


--
-- Name: experience; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.experience (
    id_experience integer NOT NULL,
    title_experience character varying(150),
    place_experience character varying(155),
    date_start_experience date,
    date_end_experience date,
    content_experience text,
    id_type_experience integer
);


--
-- Name: experience_id_experience_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.experience_id_experience_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: experience_id_experience_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.experience_id_experience_seq OWNED BY admin.experience.id_experience;


--
-- Name: experience_type; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.experience_type (
    id_experience_type integer NOT NULL,
    title_experience_type character varying(120) NOT NULL
);


--
-- Name: experience_type_id_experience_type_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.experience_type_id_experience_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: experience_type_id_experience_type_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.experience_type_id_experience_type_seq OWNED BY admin.experience_type.id_experience_type;


--
-- Name: header_info; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.header_info (
    id_header_info integer NOT NULL,
    img_path_header_info character varying(255),
    alt_img_header_info character varying(100),
    url_twitter_header_info character varying(255),
    url_linkedin_header_info character varying(255),
    url_github_header_info character varying(255)
);


--
-- Name: header_info_id_header_info_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.header_info_id_header_info_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: header_info_id_header_info_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.header_info_id_header_info_seq OWNED BY admin.header_info.id_header_info;


--
-- Name: label_type; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.label_type (
    id_label_type integer NOT NULL,
    title_label_type character varying(150)
);


--
-- Name: label_type_id_label_type_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.label_type_id_label_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: label_type_id_label_type_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.label_type_id_label_type_seq OWNED BY admin.label_type.id_label_type;


--
-- Name: message; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.message (
    id_message integer NOT NULL,
    fullname_message character varying(150),
    email_message character varying(255),
    content_message text,
    datetime_message timestamp without time zone
);


--
-- Name: message_id_message_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.message_id_message_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: message_id_message_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.message_id_message_seq OWNED BY admin.message.id_message;


--
-- Name: project; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.project (
    id_project integer NOT NULL,
    content_project character varying(255),
    url_project character varying(255),
    img_path_project character varying(255),
    alt_img_project character varying(100)
);


--
-- Name: project_id_project_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.project_id_project_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: project_id_project_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.project_id_project_seq OWNED BY admin.project.id_project;


--
-- Name: project_label_type; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.project_label_type (
    id_project_label_type integer NOT NULL,
    id_project integer,
    id_label_type integer
);


--
-- Name: project_label_type_id_project_label_type_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.project_label_type_id_project_label_type_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: project_label_type_id_project_label_type_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.project_label_type_id_project_label_type_seq OWNED BY admin.project_label_type.id_project_label_type;


--
-- Name: skills; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin.skills (
    id_skills integer NOT NULL,
    img_skills character varying(255),
    alt_img_skills character varying(100)
);


--
-- Name: skills_id_skills_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.skills_id_skills_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: skills_id_skills_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.skills_id_skills_seq OWNED BY admin.skills.id_skills;


--
-- Name: user; Type: TABLE; Schema: admin; Owner: -
--

CREATE TABLE admin."user" (
    id_user integer NOT NULL,
    username_user character varying(255),
    password_user character varying(255)
);


--
-- Name: user_id_user_seq; Type: SEQUENCE; Schema: admin; Owner: -
--

CREATE SEQUENCE admin.user_id_user_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: user_id_user_seq; Type: SEQUENCE OWNED BY; Schema: admin; Owner: -
--

ALTER SEQUENCE admin.user_id_user_seq OWNED BY admin."user".id_user;


--
-- Name: about id_about; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.about ALTER COLUMN id_about SET DEFAULT nextval('admin.about_id_about_seq'::regclass);


--
-- Name: contact id_contact; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.contact ALTER COLUMN id_contact SET DEFAULT nextval('admin.contact_id_contact_seq'::regclass);


--
-- Name: experience id_experience; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.experience ALTER COLUMN id_experience SET DEFAULT nextval('admin.experience_id_experience_seq'::regclass);


--
-- Name: experience_type id_experience_type; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.experience_type ALTER COLUMN id_experience_type SET DEFAULT nextval('admin.experience_type_id_experience_type_seq'::regclass);


--
-- Name: header_info id_header_info; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.header_info ALTER COLUMN id_header_info SET DEFAULT nextval('admin.header_info_id_header_info_seq'::regclass);


--
-- Name: label_type id_label_type; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.label_type ALTER COLUMN id_label_type SET DEFAULT nextval('admin.label_type_id_label_type_seq'::regclass);


--
-- Name: message id_message; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.message ALTER COLUMN id_message SET DEFAULT nextval('admin.message_id_message_seq'::regclass);


--
-- Name: project id_project; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project ALTER COLUMN id_project SET DEFAULT nextval('admin.project_id_project_seq'::regclass);


--
-- Name: project_label_type id_project_label_type; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project_label_type ALTER COLUMN id_project_label_type SET DEFAULT nextval('admin.project_label_type_id_project_label_type_seq'::regclass);


--
-- Name: skills id_skills; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.skills ALTER COLUMN id_skills SET DEFAULT nextval('admin.skills_id_skills_seq'::regclass);


--
-- Name: user id_user; Type: DEFAULT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin."user" ALTER COLUMN id_user SET DEFAULT nextval('admin.user_id_user_seq'::regclass);


--
-- Data for Name: about; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.about (id_about, fullname_about, birthday_about, city_about, email_about, phone_about, hobbies_about, current_job_about, description_about, cv_path_about) FROM stdin;
1	Arthur Geay	1997-01-01	Saint S&eacute;bastien sur Loire	arthurgeay.contact@gmail.com	06XXXXXXXX	Jeux vid&eacute;o, Cin&eacute;ma &amp; Musique test	Etudiant &amp; D&eacute;veloppeur web	<p>Passionn&eacute; d'informatique et de nouvelles technologies, mon projet professionnel s'oriente vers les m&eacute;tiers du web et plus particuli&egrave;rement celui de d&eacute;veloppeur web Backend.</p>	download/CV.pdf
\.


--
-- Data for Name: contact; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.contact (id_contact, content_contact) FROM stdin;
1	test
2	
\.


--
-- Data for Name: experience; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.experience (id_experience, title_experience, place_experience, date_start_experience, date_end_experience, content_experience, id_type_experience) FROM stdin;
1	Réparateur de téléphone	Online Repair	2016-09-01	2017-04-01	<p><strong>Les missions :</strong></p>\n\t\t\t\t\t\t<ul>\n\t\t\t\t\t\t\t<li>Diagnostics et réparations de téléphone</li>\n\t\t\t\t\t\t</ul>	1
2	Développeur web PHP/Symfony	Freelance	2018-05-01	\N	<p>Création d'une micro entreprise de développement web.</p>\n\n\t\t\t\t\t\t<p><strong>Les missions :</strong></p>\n\t\t\t\t\t\t<ul>\n\t\t\t\t\t\t\t<li>Car Manager Mai 2018 : <br /> Développement d'une application web destinée à gérer la flotte de véhicule des sociétés Duotech, Satelix et ARF.</li>\n\t\t\t\t\t\t\t<li><a href="https://valerie-dauphin.fr">Valérie-dauphin.fr</a> - Juin 2018 : <br />\n\t\t\t\t\t\t\t\tDéveloppement d'un portfolio pour l'auteure de littérature jeunesse Valérie Dauphin.</li>\n\t\t\t\t\t\t</ul>	1
4	Baccalauréat ES	\N	2015-01-01	\N	\N	2
5	L1 Arts du spectacle	\N	2015-01-01	2016-01-01	\N	2
6	Chef de projet multimédia	OpenClassrooms / IESA Multimédia	2017-01-01	2018-01-01	<p>Titre professionnel de Chef de projet multimédia enregistré au Répertoire National de la Certification Professionnelle (RNCP) au niveau II.)</p>	2
7	Bachelor Informatique et Systèmes d'Information	Ynov Informatique	2018-09-01	\N	<p>La formation d’Ynov Informatique prépare au titre d’Expert Informatique et Systèmes d’Information, enregistré au Répertoire National de la Certification Professionnelle (RNCP) au niveau I.)</p>	2
3	D&eacute;veloppeur web	ENVOLiiS	2018-07-01	2018-08-31	<p><strong>Les missions :</strong></p>\r\n<ul>\r\n<li>D&eacute;veloppement d'un portail Power BI</li>\r\n<li>D&eacute;veloppement d'un outil d'import de contrat</li>\r\n</ul>	1
\.


--
-- Data for Name: experience_type; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.experience_type (id_experience_type, title_experience_type) FROM stdin;
1	professional
2	education
\.


--
-- Data for Name: header_info; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.header_info (id_header_info, img_path_header_info, alt_img_header_info, url_twitter_header_info, url_linkedin_header_info, url_github_header_info) FROM stdin;
2	img/profile/profile.jpeg	Photo du profil	https://twitter.com/arthur_geay	https://linkedin.com/in/arthur-geay	https://github.com/arthurgeay
\.


--
-- Data for Name: label_type; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.label_type (id_label_type, title_label_type) FROM stdin;
1	HTML & CSS
2	WordPress
3	Framework Silex
4	Symfony
5	Javascript
\.


--
-- Data for Name: message; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.message (id_message, fullname_message, email_message, content_message, datetime_message) FROM stdin;
\.


--
-- Data for Name: project; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.project (id_project, content_project, url_project, img_path_project, alt_img_project) FROM stdin;
1	Réalisation d'un site web pour les activités culturelles de la ville de Moncoutant	https://moncoutant.arthurgeay.fr/	img/project/moncoutant.jpg	Site web des activités culturelles de Moncoutant
2	Réalisation d'un blog pour un écrivain	https://jeanforteroche.arthurgeay.fr/	img/project/forteroche.jpg	Blog de l'écrivain Jean Forteroche
3	Réalisation d'un système de billeterie pour le musée du Louvre	https://louvre.arthurgeay.fr	img/project/louvre.jpg	Système de billeterie pour le musée du Louvre
4	Réalisation d'une application web de saisie d'observation d'espèces d'oiseaux	https://nao.arthurgeay.fr/	img/project/nao.jpg	Application web d'observation d'oiseaux
5	Réalisation d'une application web de gestion de parc de véhicule	\N	img/project/carmanager.png	Application web de gestion de parc de véhicule
6	Réalisation d'un portfolio pour une auteure littérature jeunesse	https://valerie-dauphin.fr	img/project/valerie-dauphin.png	Portfolio auteure littérature jeunesse
\.


--
-- Data for Name: project_label_type; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.project_label_type (id_project_label_type, id_project, id_label_type) FROM stdin;
1	1	1
2	1	2
3	2	3
4	3	4
5	3	5
6	4	4
7	4	5
8	5	4
9	5	5
10	6	2
\.


--
-- Data for Name: skills; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin.skills (id_skills, img_skills, alt_img_skills) FROM stdin;
1	img/skills/html.png	HTML
2	img/skills/css.png	CSS
3	img/skills/php.png	PHP
4	img/skills/sql.png	SQL
5	img/skills/symfony.png	Symfony
6	img/skills/javascript.png	Javascript
7	img/skills/git.png	Git
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: admin; Owner: -
--

COPY admin."user" (id_user, username_user, password_user) FROM stdin;
1	arthurgeay.contact@gmail.com	$2y$10$s0VuEtKjHccKBo0u/woWduJQGtSDpNIIMYSPTS0kSzNywXbiir.1u
4	eeflfejeflj@flje.fr	$2y$10$hrSpaxAt6PP2HTYedCNOpujlGpND9NzlP0z8wA2YHvCeK3WhMf9CK
5	arthur.geay@ynov.com	$2y$10$GBXPwVe5xCjED1GacZFAxuglG9dn9XXt2Pwof1sbSA5rx364Gh3tG
\.


--
-- Name: about_id_about_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.about_id_about_seq', 1, true);


--
-- Name: contact_id_contact_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.contact_id_contact_seq', 2, true);


--
-- Name: experience_id_experience_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.experience_id_experience_seq', 12, true);


--
-- Name: experience_type_id_experience_type_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.experience_type_id_experience_type_seq', 2, true);


--
-- Name: header_info_id_header_info_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.header_info_id_header_info_seq', 2, true);


--
-- Name: label_type_id_label_type_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.label_type_id_label_type_seq', 9, true);


--
-- Name: message_id_message_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.message_id_message_seq', 4, true);


--
-- Name: project_id_project_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.project_id_project_seq', 14, true);


--
-- Name: project_label_type_id_project_label_type_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.project_label_type_id_project_label_type_seq', 24, true);


--
-- Name: skills_id_skills_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.skills_id_skills_seq', 11, true);


--
-- Name: user_id_user_seq; Type: SEQUENCE SET; Schema: admin; Owner: -
--

SELECT pg_catalog.setval('admin.user_id_user_seq', 5, true);


--
-- Name: about about_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.about
    ADD CONSTRAINT about_pkey PRIMARY KEY (id_about);


--
-- Name: contact contact_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.contact
    ADD CONSTRAINT contact_pkey PRIMARY KEY (id_contact);


--
-- Name: experience experience_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.experience
    ADD CONSTRAINT experience_pkey PRIMARY KEY (id_experience);


--
-- Name: experience_type experience_type_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.experience_type
    ADD CONSTRAINT experience_type_pkey PRIMARY KEY (id_experience_type);


--
-- Name: header_info header_info_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.header_info
    ADD CONSTRAINT header_info_pkey PRIMARY KEY (id_header_info);


--
-- Name: label_type label_type_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.label_type
    ADD CONSTRAINT label_type_pkey PRIMARY KEY (id_label_type);


--
-- Name: message message_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.message
    ADD CONSTRAINT message_pkey PRIMARY KEY (id_message);


--
-- Name: project_label_type project_label_type_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project_label_type
    ADD CONSTRAINT project_label_type_pkey PRIMARY KEY (id_project_label_type);


--
-- Name: project project_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project
    ADD CONSTRAINT project_pkey PRIMARY KEY (id_project);


--
-- Name: skills skills_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.skills
    ADD CONSTRAINT skills_pkey PRIMARY KEY (id_skills);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id_user);


--
-- Name: experience experience_id_type_experience_fkey; Type: FK CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.experience
    ADD CONSTRAINT experience_id_type_experience_fkey FOREIGN KEY (id_type_experience) REFERENCES admin.experience_type(id_experience_type);


--
-- Name: project_label_type project_label_type_id_label_type_fkey; Type: FK CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project_label_type
    ADD CONSTRAINT project_label_type_id_label_type_fkey FOREIGN KEY (id_label_type) REFERENCES admin.label_type(id_label_type);


--
-- Name: project_label_type project_label_type_id_project_fkey; Type: FK CONSTRAINT; Schema: admin; Owner: -
--

ALTER TABLE ONLY admin.project_label_type
    ADD CONSTRAINT project_label_type_id_project_fkey FOREIGN KEY (id_project) REFERENCES admin.project(id_project) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

