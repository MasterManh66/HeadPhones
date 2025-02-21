USE [headphones]
GO
/****** Object:  Table [dbo].[accounts]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[accounts](
	[accId] [int] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](100) NULL,
	[password] [nvarchar](100) NULL,
	[roleId] [int] NULL,
	[updateAt] [datetime] NULL,
	[systemDate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[accId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[bankInfo]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[bankInfo](
	[bankId] [int] IDENTITY(1,1) NOT NULL,
	[bankName] [nvarchar](100) NULL,
	[bankNumber] [varchar](20) NULL,
	[bankOwner] [nvarchar](50) NULL,
	[bankBranch] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[bankId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[brands]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[brands](
	[brandId] [int] IDENTITY(1,1) NOT NULL,
	[brandName] [nvarchar](50) NULL,
	[brandLogo] [nvarchar](50) NULL,
	[systemDate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[brandId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cart]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cart](
	[cartId] [int] IDENTITY(1,1) NOT NULL,
	[cusId] [int] NULL,
	[productId] [int] NULL,
	[cartQuantity] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[cartId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[category]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[category](
	[cateId] [int] IDENTITY(1,1) NOT NULL,
	[cateName] [nvarchar](50) NULL,
	[cateIcons] [nvarchar](100) NULL,
	[brandId] [int] NULL,
	[productId] [int] NULL,
	[updateAt] [datetime] NULL,
	[systemDate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[cateId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[customerPaymentHistory]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[customerPaymentHistory](
	[historyId] [int] IDENTITY(1,1) NOT NULL,
	[historyName] [nvarchar](50) NULL,
	[historyAmout] [int] NULL,
	[orderId] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[historyId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[customers]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[customers](
	[cusId] [int] IDENTITY(1,1) NOT NULL,
	[cusName] [nvarchar](200) NULL,
	[cusPhoneNumber] [int] NULL,
	[cusGerder] [nvarchar](10) NULL,
	[cusAddress] [nvarchar](500) NULL,
	[cusEmail] [nvarchar](50) NULL,
	[bankId] [int] NULL,
	[accId] [int] NULL,
	[systemDate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[cusId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[depot]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[depot](
	[depotId] [int] IDENTITY(1,1) NOT NULL,
	[productId] [int] NULL,
	[depotInputPrice] [int] NULL,
	[depotOutputPrice] [int] NULL,
	[productDiscountPrice] [int] NULL,
	[productQuantity] [int] NULL,
	[updateAt] [datetime] NULL,
	[systemdate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[depotId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[employee]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[employee](
	[empId] [int] IDENTITY(1,1) NOT NULL,
	[empName] [nvarchar](200) NULL,
	[empPhoneNumber] [int] NULL,
	[empGerder] [nvarchar](10) NULL,
	[empAddress] [nvarchar](500) NULL,
	[empEmail] [nvarchar](50) NULL,
	[bankId] [int] NULL,
	[accId] [int] NULL,
	[systemDate] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[empId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[orders]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[orders](
	[orderId] [int] IDENTITY(1,1) NOT NULL,
	[orderName] [nvarchar](50) NULL,
	[cartId] [int] NULL,
	[orderStatus] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[orderId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[payments]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[payments](
	[paymentId] [int] IDENTITY(1,1) NOT NULL,
	[paymentName] [nvarchar](50) NULL,
	[depotId] [int] NULL,
	[orderId] [int] NULL,
	[shipId] [int] NULL,
	[paymentTotalAmout] [int] NULL,
	[createAt] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[paymentId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[products]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[products](
	[productId] [int] IDENTITY(1,1) NOT NULL,
	[productName] [nvarchar](100) NULL,
	[productType] [nvarchar](50) NULL,
	[productTitle] [nvarchar](500) NULL,
	[productDescription] [nvarchar](max) NULL,
	[productImgThumbnail] [nvarchar](100) NULL,
	[productFolderRoot] [nvarchar](500) NULL,
	[productColor] [nvarchar](50) NULL,
	[brandId] [int] NULL,
PRIMARY KEY CLUSTERED 
(
	[productId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[roles]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[roles](
	[roleId] [int] IDENTITY(1,1) NOT NULL,
	[roleName] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[roleId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[shipping]    Script Date: 26/4/2024 3:49:28 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[shipping](
	[shipId] [int] IDENTITY(1,1) NOT NULL,
	[orderId] [int] NULL,
	[shipStatus] [nvarchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[shipId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
SET IDENTITY_INSERT [dbo].[accounts] ON 

INSERT [dbo].[accounts] ([accId], [username], [password], [roleId], [updateAt], [systemDate]) VALUES (20, N'manhtran1', N'manhtran642002', 3, CAST(N'2024-04-01T00:35:31.940' AS DateTime), CAST(N'2024-04-01T00:35:31.940' AS DateTime))
INSERT [dbo].[accounts] ([accId], [username], [password], [roleId], [updateAt], [systemDate]) VALUES (21, N'admin', N'123123', 1, CAST(N'2024-04-01T00:37:43.107' AS DateTime), CAST(N'2024-04-01T00:37:43.107' AS DateTime))
INSERT [dbo].[accounts] ([accId], [username], [password], [roleId], [updateAt], [systemDate]) VALUES (22, N'employee1', N'123456', 2, CAST(N'2024-04-01T00:38:26.790' AS DateTime), CAST(N'2024-04-01T00:38:26.790' AS DateTime))
INSERT [dbo].[accounts] ([accId], [username], [password], [roleId], [updateAt], [systemDate]) VALUES (23, N'manhtran2', N'manhtran642002', 3, CAST(N'2024-04-01T16:35:02.557' AS DateTime), CAST(N'2024-04-01T16:35:02.557' AS DateTime))
SET IDENTITY_INSERT [dbo].[accounts] OFF
GO
SET IDENTITY_INSERT [dbo].[bankInfo] ON 

INSERT [dbo].[bankInfo] ([bankId], [bankName], [bankNumber], [bankOwner], [bankBranch]) VALUES (3, N'BIDV', N'21513330710', N'Tran Tien Manh', N'Cau Giay')
INSERT [dbo].[bankInfo] ([bankId], [bankName], [bankNumber], [bankOwner], [bankBranch]) VALUES (4, N'MB Bank', N'234234230604', N'Tran Tien Manh', N'Dong Da')
SET IDENTITY_INSERT [dbo].[bankInfo] OFF
GO
SET IDENTITY_INSERT [dbo].[brands] ON 

INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (1, N'Apple', N'fileUpload/logo_apple.jpg', CAST(N'2024-04-09T23:47:40.533' AS DateTime))
INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (2, N'Huawei', N'fileUpload/logo-Huawei.png', CAST(N'2024-04-18T18:10:16.790' AS DateTime))
INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (3, N'JBL', N'fileUpload/logo_jbl.png', CAST(N'2024-04-24T17:25:01.543' AS DateTime))
INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (4, N'Sony', N'fileUpload/1713955733-logo_sony.jpg', CAST(N'2024-04-24T17:48:53.383' AS DateTime))
INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (5, N'Samsung', N'fileUpload/1713955924-logo_samsung.jpg', CAST(N'2024-04-24T17:52:04.637' AS DateTime))
INSERT [dbo].[brands] ([brandId], [brandName], [brandLogo], [systemDate]) VALUES (6, N'Asus', N'fileUpload/1713963627-logo_asus.jpg', CAST(N'2024-04-24T20:00:27.197' AS DateTime))
SET IDENTITY_INSERT [dbo].[brands] OFF
GO
SET IDENTITY_INSERT [dbo].[category] ON 

INSERT [dbo].[category] ([cateId], [cateName], [cateIcons], [brandId], [productId], [updateAt], [systemDate]) VALUES (1, N'Tai nghe', N'fa-solid fa-headphones-simple', 1, NULL, CAST(N'2024-04-14T21:45:12.060' AS DateTime), CAST(N'2024-04-14T21:45:12.060' AS DateTime))
SET IDENTITY_INSERT [dbo].[category] OFF
GO
SET IDENTITY_INSERT [dbo].[customers] ON 

INSERT [dbo].[customers] ([cusId], [cusName], [cusPhoneNumber], [cusGerder], [cusAddress], [cusEmail], [bankId], [accId], [systemDate]) VALUES (2, N'Tran Tien Manh', 584723124, N'Nam', N'B?c T? Liêm', N'manhgiang2k2@gmail.com', 4, 20, CAST(N'2024-04-01T00:35:31.950' AS DateTime))
INSERT [dbo].[customers] ([cusId], [cusName], [cusPhoneNumber], [cusGerder], [cusAddress], [cusEmail], [bankId], [accId], [systemDate]) VALUES (3, N'Manh Tran Tien', 584723124, N'Nam', N'Ha Noi', N'', 3, 23, CAST(N'2024-04-01T16:35:02.563' AS DateTime))
SET IDENTITY_INSERT [dbo].[customers] OFF
GO
SET IDENTITY_INSERT [dbo].[depot] ON 

INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (3, 3, 4990000, 3990000, 20, 10, CAST(N'2024-04-17T23:04:24.127' AS DateTime), CAST(N'2024-04-17T23:04:24.127' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (4, 4, 6190000, 5550000, 10, 10, CAST(N'2024-04-17T23:05:38.190' AS DateTime), CAST(N'2024-04-17T23:05:38.190' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (6, 13, 4490000, 3890000, 13, 15, CAST(N'2024-04-24T11:05:31.713' AS DateTime), CAST(N'2024-04-24T11:05:31.713' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (7, 14, 3990000, 2650000, 34, 12, CAST(N'2024-04-24T11:15:13.907' AS DateTime), CAST(N'2024-04-24T11:15:13.907' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (8, 15, 4790000, 4590000, 4, 15, CAST(N'2024-04-24T17:22:56.200' AS DateTime), CAST(N'2024-04-24T17:22:56.200' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (9, 16, 1490000, 1290000, 13, 5, CAST(N'2024-04-24T17:30:33.753' AS DateTime), CAST(N'2024-04-24T17:30:33.753' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (10, 17, 4990000, 4990000, 0, 5, CAST(N'2024-04-24T17:59:21.160' AS DateTime), CAST(N'2024-04-24T17:59:21.160' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (11, 18, 2190000, 1690000, 23, 5, CAST(N'2024-04-24T20:02:23.087' AS DateTime), CAST(N'2024-04-24T20:02:23.087' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (12, 19, 4790000, 3990000, 17, 5, CAST(N'2024-04-24T20:04:21.810' AS DateTime), CAST(N'2024-04-24T20:04:21.810' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (13, 20, 3790000, 2990000, 21, 10, CAST(N'2024-04-24T20:05:44.723' AS DateTime), CAST(N'2024-04-24T20:05:44.723' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (14, 21, 5850000, 4290000, 27, 10, CAST(N'2024-04-24T20:06:51.770' AS DateTime), CAST(N'2024-04-24T20:06:51.770' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (15, 22, 5490000, 2590000, 53, 10, CAST(N'2024-04-24T20:08:05.003' AS DateTime), CAST(N'2024-04-24T20:08:05.003' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (16, 23, 2390000, 1290000, 46, 10, CAST(N'2024-04-25T02:50:06.660' AS DateTime), CAST(N'2024-04-25T02:50:06.660' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (17, 24, 3999000, 2690000, 33, 5, CAST(N'2024-04-25T02:54:03.417' AS DateTime), CAST(N'2024-04-25T02:54:03.417' AS DateTime))
INSERT [dbo].[depot] ([depotId], [productId], [depotInputPrice], [depotOutputPrice], [productDiscountPrice], [productQuantity], [updateAt], [systemdate]) VALUES (18, 25, 5490000, 2890000, 47, 5, CAST(N'2024-04-25T02:57:08.720' AS DateTime), CAST(N'2024-04-25T02:57:08.720' AS DateTime))
SET IDENTITY_INSERT [dbo].[depot] OFF
GO
SET IDENTITY_INSERT [dbo].[employee] ON 

INSERT [dbo].[employee] ([empId], [empName], [empPhoneNumber], [empGerder], [empAddress], [empEmail], [bankId], [accId], [systemDate]) VALUES (1, N'Nhan Vien 1', 584723124, N'Nu', N'Ha Noi', NULL, NULL, 22, CAST(N'2024-04-07T18:01:48.137' AS DateTime))
SET IDENTITY_INSERT [dbo].[employee] OFF
GO
SET IDENTITY_INSERT [dbo].[products] ON 

INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (3, N'Tai nghe Bluetooth True Wireless HUAWEI FreeClip', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth True Wireless HUAWEI FreeClip', N'Huawei Freeclip là tai nghe không dây với thiết kế C-bridge ấn tượng cùng với Driver nam châm kép 10,8 mm mang lại trải nghiệm âm thanh vượt trội. Tai nghe có hai phiên bản màu là đen và tím cùng với đó là nhiều công nghệ âm thanh như âm thanh trực tiếp, âm thanh mở. Bên cạnh đó, sản phẩm tai nghe Huawei này còn sở hữu viên pin lớn mang lại tổng thời gian sử dụng lên đến 36 giờ cùng với đó là khả năng kháng nước và bụi bẩn chuẩn IP54.

Vì sao nên chọn mua tai nghe Huawei Freeclip sử dụng
Giữa nhiều sản phẩm tai nghe không dây trên thị trường hiện nay, Huawei Freeclip có điểm gì nổi trội đáng để người dùng chọn mua và sử dụng sản phẩm?

- Thiết kế chữ C đầy phong cách: Trả nghiệm sử dụng thoải mái

- Trình điều khiển 10.8mm: Âm thanh ngân vang và truyền cảm

- Micro tích hợp thuật toán DNN: Lọc giọng nói, đàm thoại rõ ràng

- Pin 510 mAh: mang lại thời gian sử dụng vượt trội lên đến 3 ngày với một lần sạc', N'fileUpload/1713948997-head_bluetooth_Huawei.webp', NULL, N'#000000', 2)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (4, N'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C | Chính hãng Apple Việt Nam', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth Apple AirPods Pro 2 2023 USB-C | Chính hãng Apple Vi?t Nam', N'Airpods Pro 2 Type-C với công nghệ khử tiếng ồn chủ động mang lại khả năng khử ồn lên gấp 2 lần mang lại trải nghiệm nghe - gọi và trải nghiệm âm nhạc ấn tượng. Cùng với đó, điện thoại còn được trang bị công nghệ âm thanh không gian giúp trải nghiệm âm nhạc thêm phần sống động. Airpods Pro 2 Type-C với cổng sạc Type C tiện lợi cùng viên pin mang lại thời gian trải nghiệm lên đến 6 giờ tiện lợi.

Airpods Pro 2 Type-C – Sạc type C tiện lợi, âm thanh chất lượng
Airpods Pro 2 Type-C mà mẫu tai nghe không dây chất lượng đến từ thương hiệu Apple nổi tiếng. Tai nghe Airpods Pro này với nhiều tính năng thông minh hỗ trợ mang lại trải nghiệm nghe – gọi ấn tượng. Cùng tìm hiểu chi tiết về mẫu tai nghe Airpods này sau đây.

Công nghệ khử tiếng ồn thông minh, hiệu quả gấp 2 lần
Airpods Pro 2 Type-C được trang bị công nghệ khử tiếng ồn vượt trội giúp mang lại hiệu quả lên đến 2 lần. Theo đó, tai nghe sở hữu trình điều khiển cùng thuật toán thông minh, hỗ trợ giảm bớt các tạp âm từ môi trường. Nhờ đó mang lại những trải nghiệm nghe nhạc hay đàm thoại trong các cuộc gọi rõ nét hơn.', N'fileUpload/1713949264-head_bluetooth_apple.webp', NULL, N'#ffffff', 1)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (13, N'Tai nghe Bluetooth Apple AirPods 3 2022 sạc có dây | Chính hãng Apple Việt Nam', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth Apple AirPods 3 2022 sạc có dây | Chính hãng Apple Việt Nam', N'Apple Airpods 3 2022 là mẫu tai nghe bluetooth mới nhất đến từ ông trùm công nghệ Apple. Tai nghe sở hữu thiết kế nhỏ gọn cùng rất nhiều công nghệ hiện đại tai nghe mang tới cho người dùng trải nghiệm âm thanh cực sống động. Dưới đây là điểm nổi bật trên Airpod 3 2022 mà bạn không nên bỏ qua.

Trong hộp Airpods 3 có những gì?
Airpods
Hộp sạc Lightning
Cáp chuyển từ Lightning sang USB-C
Tài liệu tham khảo
Tai nghe Apple AirPods 3 2022 hiện đại cho trải nghiệm âm thanh cực chất
Thiết kế tinh tế, tỉ mỉ và cuốn hút
Tai nghe Airpods 3 2022 sở hữu thiết kế nhỏ gọn cùng ngoại hình khá mới lạ do nút tai đã được lược bỏ. Sự tối giản trong thiết kế này mang tới cho người dùng cảm giác gọn gàng và vô cùng thoải mái. Từ đó giúp bạn sử dụng được lâu hơn cũng như phù hợp hơn với những ai đổ nhiều mồ hôi.', N'fileUpload/1713953817-head_bluetooth_airpod3_2022_apple.webp', NULL, N'#ffffff', 1)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (14, N'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth Apple AirPods 2 | Chính hãng Apple Việt Nam', N'Vừa qua, Apple đã chính thức cho ra mắt chiếc tai nghe Apple Airpods 2 sở hữu chip H1 được dành riêng giúp chuyển nhanh các cuộc gọi từ iPhone sang Airpods cũng như giảm mức tiêu thụ điện năng cực kỳ thấp. Thời gian sử dụng đến 5 giờ nghe nhạc hoặc 3 giờ đàm thoại và khi kết hợp với hộp sạc cho thời gian đến 24 giờ. Kết nối không dây chất lượng cao, tự động bật và luôn kết nối giúp sẵn sàng theo bạn đến bất kỳ đâu. Cùng tham khảo thêm về chiếc Airpod 2 này nhé.

Đánh giá tai nghe Apple AirPods 2 – Thiết kế tối giản, âm thanh tuyệt vời
AirPods 2 chính hãng VN/A là gì? Vì sao nên lựa chọn?
Đầu tiên, AirPods 2 chính hãng VN/A là hàng chính hãng do Apple sản xuất theo tiêu chuẩn của thị trường Việt Nam. Thiết bị được phân phối chính hãng thông qua các đại lý ủy quyền của Apple. Vậy tai nghe bluetooth Apple AirPods 2 chính hãng VN/A có gì khác những mẫu tai nghe cũ, tai nghe xách tay?', N'fileUpload/1713953398-head_bluetooth_airpod2_apple.webp', NULL, N'#ffffff', 1)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (15, N'Tai nghe Bluetooth Apple AirPods 3 MagSafe | Chính hãng Apple Việt Nam', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth Apple AirPods 3 MagSafe | Chính hãng Apple Việt Nam', N'Tai nghe Apple AirPods 3 Magsafe - Kiểu dáng thời thượng, chất âm lôi cuốn
Một trong những thế hệ tai nghe không dây được ưa chuộng nhất trên thị trường hiện nay là Apple AirPods 3 Magsafe. Tuy mới chỉ có được ra mắt giữa tháng 10 vừa qua nhưng AirPods 3 của Apple đã nhận được nhiều sự ưa chuộng từ phía người dùng và nhanh chóng trở nên phổ biến trên thị trường thời gian vừa rồi. Với thiết kế gọn nhẹ, bền bỉ cùng chất lượng âm thanh đỉnh cao, AirPods 3 chắc chắn là mẫu tai nghe Apple hoàn hảo mà bạn rất nên sở hữu.

Thiết kế nhỏ gọn, kiểu dáng thời thượng, năng động
So với phiên bản AirPods 2 đã được ra mắt trước đó thì thiết kế của Apple AirPods 3 đã có một vài chỉnh sửa, mang tới một vẻ ngoài khá gọn nhẹ, trẻ trung năng động cho người dùng. Phần nút tai cao su In-ear của thế hệ AirPods 2 trước đó đã được loại bỏ và được thay thế bằng nút tai dạng Earbuds nhỏ gọn, có khả năng bám tai cực tốt, không dễ bị rơi ra trong quá trình nghe nhạc. ', N'fileUpload/1713954176-head_bluetooth_airpod3_magsafe.webp', NULL, N'#ffffff', 1)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (16, N'Tai nghe Bluetooth True Wireless JBL Wave Beam', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth True Wireless JBL Wave Beam', N'Tai nghe JBL Wave Beam được trang bị trình điều kiển 8mm mang lại âm thanh vượt trội với âm bass sâu kết hợp với thiết kế đóng kín giúp tăng cường hiệu suất âm thanh. Tai nghe được trang bị thiết kế khá vừa vặn cùng với đó là bộ sưu tập màu sắc đa dạng như xanh, đen, trắng và vàng. JBL Wave Beam với công nghệ Smart Ambient cho phép người dùng dễ dàng dễ dàng nghe được âm thanh xung quanh, cùng với đó là tính năng TalkThru hỗ trợ tạm dừng âm nhạc nhanh chóng để tham gia các cuộc trò chuyện với bạn bè.

Tai nghe không dây JBL Wave Beam – Trải nghiệm âm thanh với âm bass sâu
Tai nghe không dây JBL Wave Beam sở hữu thiết kế công thái học nhỏ gọn cùng âm thanh vượt trội. Mẫu tai nghe JBL này hứa hẹn sẽ mang lại cho người dùng những trải nghiệm âm thanh vượt trội.

Trình điều khiển 8mm cùng âm bass sâu
Tai nghe JBL Wave Beam được JBL trang bị cho màng loa kích thước 8mm nhờ đó mang lại trải nghiệm âm thanh vượt trội với âm bass sâu. Cùng với đó tai nghe còn được trang bị công nghệ Smart Ambient giúp người dùng tạm dừng nhanh chóng để có thể bắt đầu cuộc trò chuyện với người dùng mà không cần tháo tai nghe.', N'fileUpload/1713954633-head_bluetooth_wireless_jbl.webp', NULL, N'#ffffff', 3)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (17, N'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds2 Pro', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth True Wireless Samsung Galaxy Buds2 Pro', N'Sau sản phẩm Galaxy Buds Pro, hãng công nghệ Samsung tiếp tục nghiên cứu và cải tiến để cho ra phiên bản mới với tên gọi Samsung Galaxy Buds Pro 2. Vậy tai nghe bluetooth Samsung Galaxy Buds Pro 2 có gì nâng cấp, có đáng để trải nghiệm không?

Tai nghe Samsung Galaxy Buds 2 Pro – Âm thanh chất lượng, thiết kế đỉnh cao
Tai nghe true Wireless của Samsung có sự phát triển khá vượt trội so với những đối thủ khác, và hãng đã phát triển và chuẩn bị cho ra mắt sản phẩm mới mang tên Samsung Galaxy Buds2 Pronày. Nếu bạn quan tâm tới thiết bị này, thì có thể tham khảo thêm thông tin chi tiết ở phía dưới đây nhé.

Đánh giá Samsung Galaxy Buds2 Pro có gì nổi bật?
Khi đã biết thông tin qua về ngày ra mắt, thì giờ cùng tìm những điểm nổi bật của sản phẩm trong phần này nhé.

Thiết kế sang trọng
Samsung Buds 2 Pro thế hệ mới được Samsung tân trang với thiết kế hiện đại hơn, nhưng vẫn giữ kiểu dáng in-ear “hạt đậu” đặc trưng của dòng sản phẩm này. Có thể, nhà sản xuất tinh chỉnh lại ngoại hình nhỏ gọn hơn, mang lại cảm giác đeo lên tai dễ chịu, thoải mái. Và kiểu thiết kế của thiết bị này được nghiên cứu rất kỹ lưỡng, đạt chuẩn công thái học, nằm gọn trong tai nên khi sử dụng thời gian dài sẽ không bị đau, vướng.', N'fileUpload/1713956361-head_bluetooth_wireless_ss.webp', NULL, N'#d9cdea', 5)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (18, N'Tai nghe Bluetooth True Wireless Gaming ROG Cetra', N'Tai nghe Gaming', N'Tai nghe Bluetooth True Wireless Gaming ROG Cetra', N'Tai nghe không dây ROG Cetra - Tiện lợi, âm thanh sống động
ROG Cetra thích hợp cho mọi độ tuổi đặc biệt là giới trẻ thường xuyên học hành, làm việc và giải trí. Tai nghe giúp cho người dùng có nhiều không gian riêng tư, tích hợp công nghệ chống ồn thông minh.

Công nghệ chống ồn hiện đại và sử dụng trong thời gian dài
Tai nghe Asus ROG Cetra True Wireless được trang bị công nghệ chống ồn kép (Hybrid ANC) hiện đại, giúp lọc tiếng ồn bên ngoài lẫn bên trong một cách hiệu quả. Tai nghe đem lại cho bạn trải nghiệm âm thanh một cách sống động, không bị quấy rầy khi tận hưởng những bản nhạc yêu thích của mình.', N'fileUpload/1713963743-head_gaming_rog_asus.webp', NULL, N'#000000', 6)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (19, N'Tai nghe không dây Gaming Sony INZONE Buds', N'Tai nghe Gaming', N'Tai nghe không dây Gaming Sony INZONE Buds', N'Tai nghe không dây Sony INZONE Buds đem tới trải nghiệm âm thanh sống động với hàng loạt các công nghệ tiên tiến như chống ồn chủ động, 360 Spatial Sound. Bên cạnh đó, thế hệ tai nghe này còn sở hữu thời lượng pin lên đến 12 giờ cho tai nghe và 24 giờ khi sử dụng cùng hộp sạc, đem tới trải nghiệm nghe nhạc giải trí suốt ngày dài. Đặc biệt hơn, tai nghe còn đi kèm với khả năng kháng nước IPX4, mang lại sự thoải mái và linh hoạt cho người dùng ngay cả khi đang ở trong môi trường nước. 

Tai nghe không dây Sony INZONE Buds - Chất lượng âm thanh siêu sống động, thời lượng pin lớn
Tai nghe không dây Sony INZONE Buds được đánh giá là một thiết bị âm thanh đột phá nhờ sở hữu công nghệ âm thanh tinh tế cùng thiết kế nhỏ gọn, thời trang. Với đẳng cấp và chất lượng của thương hiệu Sony, sản phẩm tai nghe Sony này không chỉ là một ấn phẩm tai nghe thông thường mà còn là nguồn cảm hứng âm nhạc hoàn hảo. Hãy cùng mình khám phá những đặc điểm và trải nghiệm độc đáo mà Sony INZONE Buds mang lại ngay trong bài viết dưới này bạn nhé!

Âm nhạc sống động với driver 8.4mm
Được trang bị màng loa hiện đại, kích cỡ 8.4mm, tai nghe không dây Sony INZONE Buds có thể dễ dàng nâng cấp trải nghiệm âm thanh của người dùng lên một tầm cao mới. Theo đó, thiết kế đặc biệt của tai nghe được tối ưu hóa để phản ánh không gian âm thanh 360 độ, đem lại trải nghiệm chiến game siêu chân thực. 

Khi được kết hợp với công nghệ chống ồn chủ động, thế hệ tai nghe Sony này đảm bảo rằng mỗi chuyển động và âm thanh trong game sẽ đều trở nên vô cùng sống động, giúp bạn tập trung tối đa mà không bị làm phiền.', N'fileUpload/1713963861-head_gaming_inzone_sony.webp', NULL, N'#ffffff', 4)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (20, N'Tai nghe Gaming chụp tai không dây Sony INZONE H5', N'Tai nghe Gaming', N'Tai nghe Gaming chụp tai không dây Sony INZONE H5', N'Với công nghệ 360 Spatial Sound, tai nghe chụp tai Sony INZONE H5 cho phép bạn nghe thấy hướng và khoảng cách đến đối thủ trong trò chơi. Tai nghe còn có một thời lượng pin lên đến 28 giờ, cho phép bạn chơi game suốt cả ngày mà không lo hết pin. Được thiết kế nhẹ nhàng với trọng lượng 260g, bạn có thể chơi game trong thời gian dài mà không cảm thấy mệt mỏi hay không thoải mái.

Tai nghe chụp tai Sony INZONE H5 – Âm thanh sống động, chơi game đỉnh cao
Tai nghe chụp tai Sony INZONE H5 là một mẫu tai nghe Sony hỗ trợ chơi game vớ giá cả phải chăng, cung cấp chất lượng âm thanh và khả năng chơi game tốt. Điều này sẽ giúp bạn giành lợi thế trong các trận đấu và nâng cao trải nghiệm chơi game của bạn một cách hiệu quả.

Công nghệ 360 Spatial Sound, mang về mọi lợi thế
Với công nghệ này, bạn sẽ được hưởng âm thanh không gian 360 độ, cho phép bạn dễ dàng phát hiện và xác định vị trí của đối thủ trong game. Bằng cách sử dụng thuật toán và hiệu ứng âm thanh không gian, tai nghe tạo ra một môi trường âm thanh sống động.', N'fileUpload/1713963944-head_gaming_izoneh5_sony.webp', NULL, N'#ffffff', 4)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (21, N'Tai nghe Gaming chụp tai Sony Inzone H9', N'Tai nghe Gaming', N'Tai nghe Gaming chụp tai Sony Inzone H9', N'Tai nghe Gaming Sony INZONE H9 - Trang bị công nghệ tiên tiến
Sản phầm tai nghe Sony INZONE H9mang lại trải nghiệm âm thanh sống động, giúp bạn chơi một cách tập trung cao độ nhất. Nếu bạn quan tâm tới sản phẩm tai nghe này, thì hãy đọc phần nội dung phía dưới đây để hiểu rõ hơn nhé.

Âm thanh vòm chất lượng
Điểm sáng giá nhất trên chiếc tai nghe Gaming Sony INZONE H9, đó chính là trang bị công nghệ 360 Spatial Sound, đem đến định dạng âm thanh chất lượng cao, nghe được từ nhiều hướng khác nhau, mang đến chất âm chân thực, sống động.', N'fileUpload/1713964011-head_gaming_izoneh9_sony.webp', NULL, N'#ffffff', 4)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (22, N'Tai nghe Gaming JBL Quantum One', N'Tai nghe Gaming', N'Tai nghe Gaming JBL Quantum One', N'Nếu bạn đang tìm kiếm cho mình một tai nghe gaming thời trang tiện lợi và mang tới cho bạn âm thanh 360 độ chuyên nghiệp thì tai nghe JBL Quantum One là sự lựa chọn tuyệt vời nhất. Kiểu dáng thời trang cùng Driver kim loại Neodymium lớn cho chất lượng âm thanh vô cùng hoành tráng. Tất cả sẽ tạo cho bạn một không gian âm thanh chân thực chưa từng có.

Tai nghe JBL Quantum One – Thiết kế đẹp, âm tốt, giá phải chăng
Tai nghe JBL Quantum One sở hữu thiết kế đậm chất gaming với thiết kế thoải mái, dễ sử dụng trong thời gian dài. Không chỉ vậy, thiết bị còn trang bị công nghệ chống ồn kết hợp công nghệ QuantumSPHERE 360™ cho trải nghiệm âm thanh 3D chân thực.

Thiết kế công thái học, mang lại cảm giác đeo thoải mái
JBL Quantum ONE sở hữu thiết kế từ chất liệu cao cấp vô cùng sang trọng. Ngoài ra dãi trùm đầu nhẹ rất thoáng khí, đệm bọc da cao cấp cùng lớp xốp mềm mai giúp bạn đeo lâu khi chơi game không bị đau tai hay nóng.', N'fileUpload/1713964084-head_gaming_quantum1_jbl.webp', NULL, N'#000000', 3)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (23, N'Tai nghe chụp tai Gaming Sony Inzone H3', N'Tai Nghe Bluetooth', N'Tai nghe chụp tai Gaming Sony Inzone H3', N'Tai nghe gaming chụp tai Sony INZONE H3 - Công nghệ tiên tiến cùng diện mạo tối ưu
Tai nghe chụp tai Sony INZONE H3 là mẫu tai nghe gaming được thiết kế với công nghệ tiên tiến nhất dành cho các game thủ. Thiết kế mới đã giúp cho âm thanh trở nên sống động hơn và dễ vận hành hơn.

Công nghệ âm thanh tiên tiến
Sony INZONE H3 được thiết kế với cấu trúc âm học đối xứng, vừa đủ để giúp âm thanh trở nên sống động hơn rất nhiều lần. Nhờ được kích hoạt từ phần mềm PC INZONE Hub, Tai nghe có thể tái tạo tín hiệu thành âm thanh vòm 7.1 kênh.', N'fileUpload/1713988206-head_gaming_inzoneh3_sony.webp', NULL, N'#ffffff', 4)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (24, N'Tai nghe Bluetooth True Wireless JBL Live Pro 2', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth True Wireless JBL Live Pro 2', N'Tai nghe JBL Live Pro 2 – Trải nghiệm âm nhạc ấn tượng
Sản phẩm JBL Live Pro 2 có thiết kế độc đáo, hút mắt cùng khả năng loại bỏ tiếng ồn tuyệt vời đã thu hút sự quan tâm của không ít người dùng. Dòng tai nghe không dây có thể thưởng thức âmnhạc, thực hiện cuộc gọi và không bị ảnh hưởng bởi bất kỳ tiếng ồn nào từ môi trường xung quanh. 

Âm thanh JBL Signature Sound vượt trội
Tai nghe Live Pro 2 được trang bị âm thanh JBL Signature Sound kết hợp với driver kích thước 11mm mang lại cho người dùng trải nghiệm âm thanh vượt trội.

', N'fileUpload/1713988443-head_bluetooth_livepro2_jbl.webp', NULL, N'#000000', 3)
INSERT [dbo].[products] ([productId], [productName], [productType], [productTitle], [productDescription], [productImgThumbnail], [productFolderRoot], [productColor], [brandId]) VALUES (25, N'Tai nghe Bluetooth True Wireless Sony Linkbuds S', N'Tai Nghe Bluetooth', N'Tai nghe Bluetooth True Wireless Sony Linkbuds S', N'Tai nghe Sony LinkBuds S - Thiết kế trẻ trung, âm thanh sống động
Hãy tối ưu hóa trải nghiệm âm nhạc của bạn với sản phẩm Sony LinkBuds S - dòng tai nghe mang kiểu dáng trẻ trung gọn nhẹ cùng chất âm sống động và thời lượng pin tốt sẽ đồng hành cùng bạn suốt cả ngày.

Thiết kế tinh giản, trẻ trung và đeo thoải mái
Tai nghe không dây Sony LinkBuds S là lựa chọn tuyệt vời cho nhu cầu tận hưởng âm nhạc cả ngày của bạn. Tai nghe mang kiểu dáng tinh giản, trẻ trung và năng động phù hợp với tất cả audiophile. Mỗi bên củ tai được Sony thiết kế cho trọng lượng nhẹ gọn, vừa vặn tai người đeo, giúp mang đến trải nghiệm nghe nhạc thoải mái xuyên suốt ngày dài.', N'fileUpload/1713988628-head_bluetooth_linkbuds_sony.webp', NULL, N'#ffffff', 4)
SET IDENTITY_INSERT [dbo].[products] OFF
GO
SET IDENTITY_INSERT [dbo].[roles] ON 

INSERT [dbo].[roles] ([roleId], [roleName]) VALUES (1, N'Admin')
INSERT [dbo].[roles] ([roleId], [roleName]) VALUES (2, N'Employee')
INSERT [dbo].[roles] ([roleId], [roleName]) VALUES (3, N'User')
SET IDENTITY_INSERT [dbo].[roles] OFF
GO
ALTER TABLE [dbo].[accounts]  WITH CHECK ADD FOREIGN KEY([roleId])
REFERENCES [dbo].[roles] ([roleId])
GO
ALTER TABLE [dbo].[cart]  WITH CHECK ADD FOREIGN KEY([cusId])
REFERENCES [dbo].[customers] ([cusId])
GO
ALTER TABLE [dbo].[cart]  WITH CHECK ADD FOREIGN KEY([productId])
REFERENCES [dbo].[products] ([productId])
GO
ALTER TABLE [dbo].[category]  WITH CHECK ADD FOREIGN KEY([brandId])
REFERENCES [dbo].[brands] ([brandId])
GO
ALTER TABLE [dbo].[category]  WITH CHECK ADD FOREIGN KEY([productId])
REFERENCES [dbo].[products] ([productId])
GO
ALTER TABLE [dbo].[customerPaymentHistory]  WITH CHECK ADD FOREIGN KEY([orderId])
REFERENCES [dbo].[orders] ([orderId])
GO
ALTER TABLE [dbo].[customers]  WITH CHECK ADD FOREIGN KEY([accId])
REFERENCES [dbo].[accounts] ([accId])
GO
ALTER TABLE [dbo].[customers]  WITH CHECK ADD FOREIGN KEY([bankId])
REFERENCES [dbo].[bankInfo] ([bankId])
GO
ALTER TABLE [dbo].[depot]  WITH CHECK ADD FOREIGN KEY([productId])
REFERENCES [dbo].[products] ([productId])
GO
ALTER TABLE [dbo].[employee]  WITH CHECK ADD FOREIGN KEY([accId])
REFERENCES [dbo].[accounts] ([accId])
GO
ALTER TABLE [dbo].[employee]  WITH CHECK ADD FOREIGN KEY([bankId])
REFERENCES [dbo].[bankInfo] ([bankId])
GO
ALTER TABLE [dbo].[orders]  WITH CHECK ADD FOREIGN KEY([cartId])
REFERENCES [dbo].[cart] ([cartId])
GO
ALTER TABLE [dbo].[payments]  WITH CHECK ADD FOREIGN KEY([depotId])
REFERENCES [dbo].[depot] ([depotId])
GO
ALTER TABLE [dbo].[payments]  WITH CHECK ADD FOREIGN KEY([orderId])
REFERENCES [dbo].[orders] ([orderId])
GO
ALTER TABLE [dbo].[payments]  WITH CHECK ADD FOREIGN KEY([shipId])
REFERENCES [dbo].[shipping] ([shipId])
GO
ALTER TABLE [dbo].[products]  WITH CHECK ADD FOREIGN KEY([brandId])
REFERENCES [dbo].[brands] ([brandId])
GO
ALTER TABLE [dbo].[shipping]  WITH CHECK ADD FOREIGN KEY([orderId])
REFERENCES [dbo].[orders] ([orderId])
GO
