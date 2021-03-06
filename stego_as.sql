USE [stego_as]
GO
/****** Object:  Table [dbo].[check_file]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[check_file](
	[id_checkfile] [int] IDENTITY(1,1) NOT NULL,
	[id_check_name] [int] NOT NULL,
	[file_name] [varchar](255) NOT NULL,
	[file_type] [varchar](255) NOT NULL,
	[file_size] [int] NOT NULL,
	[hash] [char](32) NULL,
	[timestamp] [datetime] NOT NULL,
	[reg_key] [varchar](max) NULL,
 CONSTRAINT [IX_check_file] UNIQUE NONCLUSTERED 
(
	[id_check_name] ASC,
	[file_name] ASC,
	[file_type] ASC,
	[file_size] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[st_prog]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[st_prog](
	[st_prog_name] [nvarchar](50) NOT NULL,
	[is_portable] [int] NULL,
	[version] [varchar](10) NULL,
	[id_vid] [int] NULL,
	[extention] [varchar](50) NULL,
	[algoritm] [varchar](50) NULL,
	[author] [varchar](50) NULL,
	[year_create] [varchar](50) NULL,
	[encryption] [varchar](50) NULL,
	[OS] [varchar](50) NULL,
 CONSTRAINT [PK_st_prog] PRIMARY KEY CLUSTERED 
(
	[st_prog_name] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[file_as]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[file_as](
	[id_file_as] [int] IDENTITY(1,1) NOT NULL,
	[file_name] [varchar](50) NOT NULL,
	[st_prog_name] [nvarchar](50) NULL,
	[type] [varchar](150) NULL,
	[key_registry] [varchar](max) NULL,
	[size] [bigint] NULL,
	[SHA1] [char](40) NULL,
	[SHA256] [char](64) NULL,
	[MD5] [char](32) NULL,
 CONSTRAINT [PK_file] PRIMARY KEY CLUSTERED 
(
	[id_file_as] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  UserDefinedFunction [dbo].[tf_Check_hash]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[tf_Check_hash]
(
	@check_name int
)
RETURNS TABLE 
AS
RETURN
(
--SELECT    check_file.check_name Проверка, check_file.file_name AS Файл, check_file.file_type Тип, 
--                      check_file.file_size Размер,  st_prog.st_prog_name Программа, file_as.file_name ФайлБаза, file_as.type ТипФайлБаза, file_as.size РазмерФайлБаза, file_as.hash Хэш
--FROM         st_prog INNER JOIN
--                      file_as ON st_prog.st_prog_name = file_as.st_prog_name INNER JOIN
--                      check_file ON file_as.hash = check_file.hash
SELECT Проверка, Файл+'  |  '+ Тип+'  |  ' + CAST(Размер as varchar(max)) [Файл из проверки], ФайлБаза+'  |  ' + ТипФайлБаза+'  |  ' + CAST(РазмерФайлБаза as varchar(max))[Файл из базы], Программа, HashDB Хэш  FROM
(SELECT     st_prog.st_prog_name Программа, file_as.file_name ФайлБаза, file_as.type ТипФайлБаза, file_as.size РазмерФайлБаза, file_as.md5 HashDB
	FROM         st_prog INNER JOIN  file_as ON st_prog.st_prog_name = file_as.st_prog_name 
	--WHERE hash in(SELECT  hash FROM  dbo.check_file where check_name like @check_name  INTERSECT SELECT   hash FROM file_as)
) fromDB
INNER JOIN
(SELECT    id_check_name Проверка, file_name AS Файл, file_type Тип, file_size Размер, hash HashComp
	FROM      check_file
    WHERE id_check_name= @check_name-- and reg_key is null--hash in(SELECT  hash FROM  dbo.check_file where check_name like @check_name INTERSECT	SELECT   hash FROM file_as	)
) fromComp

on fromDB.HashDB=fromComp.HashComp
--WHERE fromComp.Проверка like @check_name
)

--select distinct * from tf_Check_hash('12')
GO
/****** Object:  UserDefinedFunction [dbo].[tf_Check_key]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		<Author,,Name>
-- Create date: <Create Date,,>
-- Description:	<Description,,>
-- =============================================
CREATE FUNCTION [dbo].[tf_Check_key]
(
	@id_check_name int
)
RETURNS TABLE 
AS
RETURN
(

	SELECT    @id_check_name Проверка, st_prog.st_prog_name Программа, key_registry КлючБаза
	FROM         st_prog INNER JOIN  file_as ON st_prog.st_prog_name = file_as.st_prog_name 
	WHERE (SELECT reg_key FROM check_file WHERE id_check_name = @id_check_name and key_registry<>'') like '%'+key_registry+'%' AND key_registry<>''

)

--select distinct * from tf_Check_hash('12')


GO
/****** Object:  Table [dbo].[check]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[check](
	[id_check_name] [int] IDENTITY(1,1) NOT NULL,
	[check_name] [nchar](30) NULL,
	[id_users] [int] NULL,
 CONSTRAINT [PK_check] PRIMARY KEY CLUSTERED 
(
	[id_check_name] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[object]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[object](
	[id_object] [int] NOT NULL,
	[name_objects] [nchar](30) NULL,
 CONSTRAINT [PK_object] PRIMARY KEY CLUSTERED 
(
	[id_object] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[object_role]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[object_role](
	[id_object] [int] NULL,
	[id_role] [int] NULL,
	[is_visible] [nchar](10) NULL,
	[is_clickable] [nchar](10) NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[role]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[role](
	[id_role] [int] NOT NULL,
	[name_role] [nchar](20) NULL,
 CONSTRAINT [PK_role] PRIMARY KEY CLUSTERED 
(
	[id_role] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[type_stego]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[type_stego](
	[id_vid] [int] IDENTITY(1,1) NOT NULL,
	[vid_name] [varchar](50) NULL,
 CONSTRAINT [PK_vid] PRIMARY KEY CLUSTERED 
(
	[id_vid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 30.11.2021 19:41:48 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id_users] [int] IDENTITY(1,1) NOT NULL,
	[id_role] [int] NULL,
	[name_users] [nchar](20) NULL,
	[password] [nchar](20) NULL,
 CONSTRAINT [PK_users] PRIMARY KEY CLUSTERED 
(
	[id_users] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[check_file] ADD  CONSTRAINT [DF_checkfile_timestamp]  DEFAULT (getdate()) FOR [timestamp]
GO
ALTER TABLE [dbo].[check]  WITH CHECK ADD  CONSTRAINT [FK_check_users] FOREIGN KEY([id_users])
REFERENCES [dbo].[users] ([id_users])
GO
ALTER TABLE [dbo].[check] CHECK CONSTRAINT [FK_check_users]
GO
ALTER TABLE [dbo].[check_file]  WITH CHECK ADD  CONSTRAINT [FK_check_file_check] FOREIGN KEY([id_check_name])
REFERENCES [dbo].[check] ([id_check_name])
GO
ALTER TABLE [dbo].[check_file] CHECK CONSTRAINT [FK_check_file_check]
GO
ALTER TABLE [dbo].[file_as]  WITH CHECK ADD  CONSTRAINT [FK_file_as_st_prog] FOREIGN KEY([st_prog_name])
REFERENCES [dbo].[st_prog] ([st_prog_name])
GO
ALTER TABLE [dbo].[file_as] CHECK CONSTRAINT [FK_file_as_st_prog]
GO
ALTER TABLE [dbo].[object_role]  WITH CHECK ADD  CONSTRAINT [FK_object_role_object] FOREIGN KEY([id_object])
REFERENCES [dbo].[object] ([id_object])
GO
ALTER TABLE [dbo].[object_role] CHECK CONSTRAINT [FK_object_role_object]
GO
ALTER TABLE [dbo].[object_role]  WITH CHECK ADD  CONSTRAINT [FK_object_role_role] FOREIGN KEY([id_role])
REFERENCES [dbo].[role] ([id_role])
GO
ALTER TABLE [dbo].[object_role] CHECK CONSTRAINT [FK_object_role_role]
GO
ALTER TABLE [dbo].[st_prog]  WITH CHECK ADD  CONSTRAINT [FK_st_prog_vid] FOREIGN KEY([id_vid])
REFERENCES [dbo].[type_stego] ([id_vid])
GO
ALTER TABLE [dbo].[st_prog] CHECK CONSTRAINT [FK_st_prog_vid]
GO
ALTER TABLE [dbo].[users]  WITH CHECK ADD  CONSTRAINT [FK_users_role] FOREIGN KEY([id_role])
REFERENCES [dbo].[role] ([id_role])
GO
ALTER TABLE [dbo].[users] CHECK CONSTRAINT [FK_users_role]
GO
