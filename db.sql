-- om_satya_erp database

CREATE DATABASE om_satya_erp;

USE om_satya_erp;

CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) NOT NULL,
    `remember_token` varchar(100) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `states` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cities` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `firms ` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `sh_code` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    'city_id' int(11) NOT NULL,
    'state_id' int(11) NOT NULL,
    `pincode` int(11) NOT NULL,
    'phone_no' int(11) NOT NULL,
    `gst_no` varchar(25) NOT NULL,
    `pan_no` varchar(25) NOT NULL,
    `reg_no` varchar(25) NOT NULL,
    `bank_name` varchar(255) NOT NULL,
    `branch_name` varchar(255) NOT NULL,
    `bank_account_no` varchar(255) NOT NULL,
    `bank_ifsc_code` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'areas' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'owners' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `phone_no` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'contact_persons' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `phone_no` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'engineers' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `phone_no` int(11) NOT NULL,
    `area_id` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'years' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `from_date` date NOT NULL,
    `to_date` date NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'parties' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `address` varchar(255) NOT NULL,
    `city_id` int(11) NOT NULL,
    `state_id` int(11) NOT NULL,
    `pincode` int(11) NOT NULL,
    `phone_no` int(11) NOT NULL,
    `gst_no` varchar(25) NOT NULL,
    `contact_person_id` int(11) NOT NULL,
    `owner_id` int(11) NOT NULL,
    `area_id` int(11) NOT NULL,
    `firm_id` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'product_groups' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'products' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `product_group_id` int(11) NOT NULL,
    `tag` int (11) NOT NULL DEFAULT 1,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'item_parts' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `product_group_id` int(11) NOT NULL,
    `tag` int (11) NOT NULL DEFAULT 2,
    `hsn_code` varchar(8) NOT NULL,
    `gst` float(8,2) NOT NULL,
    `rate` float(8,2) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'complaint_types' (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `description` varchar(255),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table statuses (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table service_types (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'machine_sales_entries' (
    `id` int(11) NOT NULL,
    `firm_id` int(11) NOT NULL,
    `year_id` int(11) NOT NULL,
    `bill_no` int(11) NOT NULL,
    `date` date NOT NULL,
    `party_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `person_no` varchar(25),
    `mc_no` varchar(25) NOT NULL, -- machine no
    `install_date` date NOT NULL,
    `service_expiry_date` date NOT NULL,
    `free_service` boolean NOT NULL DEFAULT 0, -- 0 - false, 1 - true
    `order_no` varchar(25),
    `remarks` varchar(255),
    `service_type_id` int(11) NOT NULL,
    `image` varchar(255),
    `lat` varchar(255),
    `long` varchar(255),
    `map_url` varchar(255),
    `tag` int (11) NOT NULL DEFAULT 1,
    `is_active` boolean NOT NULL DEFAULT 1,
    `mic_fitting_engineer_id` int(11) NOT NULL,
    `delivery_engineer_id` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'complaints' (
    `id` int(11) NOT NULL,
    `user_id` int(11),
    `firm_id` int(11) NOT NULL,
    `year_id` int(11) NOT NULL,
    `date` date NOT NULL,
    `time` time NOT NULL,
    `complaint_type_id` int(11) NOT NULL,
    `sales_entry_id` int(11) NOT NULL,
    `product_id` int(11) NOT NULL,
    `remarks` varchar(255) NOT NULL,
    `image` varchar(255) NOT NULL,
    `engineer_id` int(11),
    `engineer_assign_date` date,
    `engineer_assign_time` time,
    `engineer_complaint_id` int(11) NOT NULL,
    `jointengg` varchar(255),
    `service_type_id` int(11) NOT NULL,
    `status_id` int(11) NOT NULL,
    `complaint` varchar(255) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

Create table 'complaint_service_parts_details' (
    `id` int(11) NOT NULL,
    `complaint_id` int(11) NOT NULL,
    `part_id` int(11) NOT NULL,
    `quantity` int(11) NOT NULL,
    `remark` varchar(255),
    `is_urgent` boolean NOT NULL DEFAULT 0,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    
