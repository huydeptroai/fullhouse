-- MySQL dump 10.13  Distrib 8.0.32, for macos13 (arm64)
--
-- Host: localhost    Database: fullhouse
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `view_product_data`
--

DROP TABLE IF EXISTS `view_product_data`;
/*!50001 DROP VIEW IF EXISTS `view_product_data`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `view_product_data` AS SELECT 
 1 AS `product_id`,
 1 AS `product_name`,
 1 AS `product_slug`,
 1 AS `product_image`,
 1 AS `product_material`,
 1 AS `product_color`,
 1 AS `product_size`,
 1 AS `product_description`,
 1 AS `product_price`,
 1 AS `discount`,
 1 AS `product_quantity`,
 1 AS `featured`,
 1 AS `category_id`,
 1 AS `deleted_at`,
 1 AS `created_at`,
 1 AS `updated_at`,
 1 AS `price`,
 1 AS `count_review`,
 1 AS `avg_rating`,
 1 AS `count_order`,
 1 AS `quantity_sell`,
 1 AS `amount_sell`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_product_data`
--

/*!50001 DROP VIEW IF EXISTS `view_product_data`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_product_data` AS select `products`.`product_id` AS `product_id`,`products`.`product_name` AS `product_name`,`products`.`product_slug` AS `product_slug`,`products`.`product_image` AS `product_image`,`products`.`product_material` AS `product_material`,`products`.`product_color` AS `product_color`,`products`.`product_size` AS `product_size`,`products`.`product_description` AS `product_description`,`products`.`product_price` AS `product_price`,`products`.`discount` AS `discount`,`products`.`product_quantity` AS `product_quantity`,`products`.`featured` AS `featured`,`products`.`category_id` AS `category_id`,`products`.`deleted_at` AS `deleted_at`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,(`products`.`product_price` - `products`.`discount`) AS `price`,(select count(0) from `reviews` where (`reviews`.`product_id` = `products`.`product_id`)) AS `count_review`,(select avg(`reviews`.`rating`) from `reviews` where (`reviews`.`product_id` = `products`.`product_id`)) AS `avg_rating`,(select count(0) from `order_details` where (`order_details`.`product_id` = `products`.`product_id`)) AS `count_order`,(select sum(`order_details`.`quantity`) from `order_details` where (`order_details`.`product_id` = `products`.`product_id`)) AS `quantity_sell`,(select sum((`order_details`.`quantity` * `order_details`.`price`)) from `order_details` where (`order_details`.`product_id` = `products`.`product_id`)) AS `amount_sell` from `products` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-20 11:04:50
