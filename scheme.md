# Task Management App Database Schema
This is the database schema for the task management application.

## 1. tasks
This table stores basic information about tasks.

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `title`            | `string`          | Title of the task                                    |
| `description`      | `text`            | Detailed description of the task                      |
| `status`           | `enum`            | Task status (`pending`, `completed`, `in-progress`)   |
| `priority`         | `enum`            | Task priority (`low`, `medium`, `high`)               |
| `due_date`         | `datetime`        | Due date and time for the task                        |
| `assigned_to`      | `foreignId`       | Foreign key referencing `users.id`                    |
| `category_id`      | `foreignId`       | Foreign key referencing `task_categories.id`          |
| `created_at`       | `timestamp`       | Date and time when the task was created               |
| `updated_at`       | `timestamp`       | Date and time when the task was last updated          |

## 2. task_categories
This table stores categories for the tasks (e.g., "Development", "Design").

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `name`             | `string`          | Name of the category (e.g., "Development")            |
| `description`      | `text`            | Description of the category                           |
| `created_at`       | `timestamp`       | Date and time when the category was created           |
| `updated_at`       | `timestamp`       | Date and time when the category was last updated      |

## 3. task_comments
This table stores comments related to tasks (each comment is made by a user).

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `task_id`          | `foreignId`       | Foreign key referencing `tasks.id`                    |
| `user_id`          | `foreignId`       | Foreign key referencing `users.id`                    |
| `comment`          | `text`            | The content of the comment                            |
| `created_at`       | `timestamp`       | Date and time when the comment was created            |
| `updated_at`       | `timestamp`       | Date and time when the comment was last updated       |

## 4. task_attachments
This table stores files attached to tasks (e.g., documents, images).

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `task_id`          | `foreignId`       | Foreign key referencing `tasks.id`                    |
| `file_path`        | `string`          | Path to the attachment file                           |
| `file_type`        | `string`          | Type of the file (e.g., "image", "pdf", etc.)         |
| `created_at`       | `timestamp`       | Date and time when the attachment was uploaded        |
| `updated_at`       | `timestamp`       | Date and time when the attachment was last updated    |

## 5. task_histories
This table stores a history of changes made to tasks (e.g., status changes, priority updates).

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `task_id`          | `foreignId`       | Foreign key referencing `tasks.id`                    |
| `status`           | `enum`            | Task status (`pending`, `completed`, `in-progress`)   |
| `priority`         | `enum`            | Task priority (`low`, `medium`, `high`)               |
| `changed_by`       | `foreignId`       | Foreign key referencing `users.id` (user who made the change) |
| `created_at`       | `timestamp`       | Date and time when the change was made                |
| `updated_at`       | `timestamp`       | Date and time when the change was last updated        |

## 6. task_tags
This table stores tags associated with tasks (e.g., “bug”, “urgent”).

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `name`             | `string`          | Name of the tag                                       |
| `created_at`       | `timestamp`       | Date and time when the tag was created                |
| `updated_at`       | `timestamp`       | Date and time when the tag was last updated           |

## 7. task_details
This table stores additional, detailed information for tasks (e.g., custom fields, extra notes).

| **Field**          | **Type**          | **Description**                                       |
|--------------------|-------------------|-------------------------------------------------------|
| `id`               | `bigint`          | Primary key                                           |
| `task_id`          | `foreignId`       | Foreign key referencing `tasks.id`                    |
| `extra_info`       | `text`            | Additional information about the task                 |
| `custom_field_1`   | `string`          | Custom field for task-specific details                |
| `custom_field_2`   | `string`          | Another custom field                                  |
| `created_at`       | `timestamp`       | Date and time when the task details were created      |
| `updated_at`       | `timestamp`       | Date and time when the task details were last updated |
