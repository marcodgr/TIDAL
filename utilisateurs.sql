-- Table: public.utilisateurs

-- DROP TABLE public.utilisateurs;

CREATE TABLE IF NOT EXISTS public.utilisateurs
(
    email character varying(512) COLLATE pg_catalog."default" NOT NULL,
    password character varying(512) COLLATE pg_catalog."default" NOT NULL,
    CONSTRAINT users_pkey PRIMARY KEY (email)
)

TABLESPACE pg_default;

ALTER TABLE public.utilisateurs
    OWNER to postgres;