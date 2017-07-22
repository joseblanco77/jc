-- users

INSERT INTO `users` (`id`, `realname`, `email`, `password`, `dpi`, `cellphone`, `address`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'José Blanco', 'joseblanco77@gmail.com', '$2y$10$nB7LxcqmWA1mxPJnz6aSBOqsSwosL1baKb8.KOjXRQ.ZYmYvaa3fW', '2606-58962-0101', '5489-6745', '5 calle final, 7-55 zona 26', '1', NULL, '2017-03-17 16:00:00', '2017-03-17 16:00:00');
INSERT INTO `users` (`id`, `realname`, `email`, `password`, `dpi`, `cellphone`, `address`, `usertype`, `remember_token`, `created_at`, `updated_at`) VALUES (NULL, 'Attakinsky', 'attakinsky@gmail.com', '$2y$10$nB7LxcqmWA1mxPJnz6aSBOqsSwosL1baKb8.KOjXRQ.ZYmYvaa3fW', '2606-58962-0101', '5489-6745', '5 calle final, 7-55 zona 26', '2', NULL, '2017-03-17 16:00:00', '2017-03-17 16:00:00');


-- customers

INSERT INTO `customers` (`id`, `customername`, `phone`, `address`, `email`, `nit`, `comments`, `created_at`, `updated_at`) VALUES (NULL, 'Juan Carlos Umaña', '5555-8999', 'Hasta la chingada, carretera a El Salvador', 'yinkaumana@gmail.com', '236589-7', 'Enano marica', '2017-03-17 16:00:00', '2017-03-17 16:00:00');
INSERT INTO `customers` (`id`, `customername`, `phone`, `address`, `email`, `nit`, `comments`, `created_at`, `updated_at`) VALUES (NULL, 'Enano Marica', '5555-8999', 'Hasta la chingada, carretera a El Salvador', 'enano@gmail.com', '123658-9', 'Enano marica', '2017-03-17 16:00:00', '2017-03-17 16:00:00');

-- products

INSERT INTO `products` (`id`, `productname`, `brand`, `category`, `price`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, 'Shampoo AC', 'B&B', 'shampoo', '139.99', '20', '2017-03-17 16:00:00', '2017-03-17 16:00:00');
INSERT INTO `products` (`id`, `productname`, `brand`, `category`, `price`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, 'Acondicionador 4 en 1', 'Patito', 'shampoo', '89.99', '15', '2017-03-17 16:00:00', '2017-03-17 16:00:00');
INSERT INTO `products` (`id`, `productname`, `brand`, `category`, `price`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, 'Peine fino', 'B&B', 'accesorios', '50.00', '200', '2017-03-17 16:00:00', '2017-03-17 16:00:00');
INSERT INTO `products` (`id`, `productname`, `brand`, `category`, `price`, `quantity`, `created_at`, `updated_at`) VALUES (NULL, 'Moco de Cuca', 'Patito', 'limpieza', '29.99', '72', '2017-03-17 16:00:00', '2017-03-17 16:00:00');
