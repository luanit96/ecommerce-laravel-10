CREATE TABLE `Allcode` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `type` varchar(50),
  `valueEn` varchar(50),
  `valueVi` varchar(50)
);

CREATE TABLE `Role` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(20)
);

CREATE TABLE `Users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullName` varchar(50),
  `email` varchar(150),
  `phoneNumber` varchar(20),
  `address` varchar(200),
  `password` varchar(32),
  `roleId` int,
  `createdAt` datetime,
  `updatedAt` datetime,
  `deleted` datetime
);

CREATE TABLE `Tokens` (
  `userId` int,
  `token` varchar(32),
  `createdAt` datetime,
  PRIMARY KEY (`userId`, `token`)
);

CREATE TABLE `Category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `createdAt` datetime,
  `updatedAt` datetime
);

CREATE TABLE `Product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `categoryId` int,
  `title` varchar(250),
  `price` int,
  `discount` int,
  `thumbnail` varchar(500),
  `description` longtext,
  `information` longtext,
  `reviews` longtext,
  `createdAt` datetime,
  `updatedAt` datetime,
  `deleted` datetime
);

CREATE TABLE `Galery` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `productId` int,
  `thumbnail` varchar(500)
);

CREATE TABLE `FeedBack` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fullName` varchar(100),
  `email` varchar(250),
  `note` varchar(1000),
  `status` int DEFAULT 0,
  `createdAt` datetime,
  `updatedAt` datetime
);

CREATE TABLE `Orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `userId` int,
  `fullName` varchar(50),
  `email` varchar(150),
  `phoneNumber` varchar(20),
  `address` varchar(200),
  `note` varchar(1000),
  `orderDate` datetime,
  `status` int,
  `totalMoney` int
);

CREATE TABLE `OrderDetails` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `orderId` int,
  `productId` int,
  `price` int,
  `num` int,
  `totalMoney` int
);

CREATE TABLE `Contact` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(50),
  `icon` varchar(500),
  `contactContent` varchar(250)
);

CREATE TABLE `PostCategory` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `createdAt` datetime,
  `updatedAt` datetime
);

CREATE TABLE `Post` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `postCategoryId` int,
  `name` varchar(250),
  `thumbnail` varchar(500),
  `postContent` longtext,
  `createdAt` datetime,
  `updatedAt` datetime,
  `deleted` datetime
);

CREATE TABLE `Slider` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100),
  `images` varchar(255),
  `description` longtext,
  `createdAt` datetime,
  `updatedAt` datetime,
  `deleted` datetime
);

ALTER TABLE `Tokens` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `Users` ADD FOREIGN KEY (`roleId`) REFERENCES `Role` (`id`);

ALTER TABLE `Galery` ADD FOREIGN KEY (`productId`) REFERENCES `Product` (`id`);

ALTER TABLE `Product` ADD FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`);

ALTER TABLE `Post` ADD FOREIGN KEY (`postCategoryId`) REFERENCES `PostCategory` (`id`);

ALTER TABLE `Orders` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `OrderDetails` ADD FOREIGN KEY (`orderId`) REFERENCES `Orders` (`id`);

ALTER TABLE `OrderDetails` ADD FOREIGN KEY (`productId`) REFERENCES `Product` (`id`);
