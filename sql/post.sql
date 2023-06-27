SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `inactive` int(1) NOT NULL,
  `verified` int(1) NOT NULL,
  `last_logged_in` datetime NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` int(6) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `sign_up_date` datetime NOT NULL,
  `profile_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

INSERT INTO `users` (`id`, `inactive`, `verified`, `last_logged_in`, `username`, `password`, `email`, `phone`, `first_name`, `last_name`, `sign_up_date`, `profile_pic`) VALUES
    ('1', '0', '1', '2023-01-10 22:49:52', 'FiFiBogiem', '1234', 'huntersofunicorns@gmail.com', '543320663', 'Filip', 'Kaczor', '2023-01-10 22:49:52', 'eeee'),
    ('2', '0', '1', '2023-01-10 22:49:52', 'ZoZOL', '1234', 'ZoZOL@gmail.com', '', 'Zuzia', 'Kowal', '2023-01-10 22:49:52', 'eeee'),
    ('3', '0', '1', '2023-01-10 22:49:52', 'KocureK', '1234', 'KocureK@gmail.com', '', 'Marian', 'Nowak', '2023-01-10 22:49:52', 'eeee');

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;