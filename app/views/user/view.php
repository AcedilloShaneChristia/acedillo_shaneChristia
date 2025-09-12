<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fdf5f9;
            margin: 0;
            padding: 20px;
            color: #444;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #b83280; /* rose pink */
            font-weight: 600;
        }

        table {
            width: 85%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.08);
            border-radius: 10px;
            overflow: hidden;
            background: #fff;
            color: #333;
        }

        th, td {
            padding: 14px 18px;
            text-align: center;
            font-size: 14px;
        }

        th {
            background: linear-gradient(135deg, #d670a7, #b83280);
            color: white;
            font-size: 16px;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background: #fdf1f7; /* soft pink tint */
        }

        tr:nth-child(odd) {
            background: #fffafc;
        }

        tr:hover {
            background: #fbe0eb;
            transition: background 0.3s ease;
        }

        a {
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-weight: 500;
            transition: 0.3s;
            font-size: 13px;
        }

        /* Edit button */
        a[href*="update"] {
            background: #d670a7; /* rose pink */
            color: white;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
        }

        a[href*="update"]:hover {
            background: #b83280; /* deep pink */
            transform: translateY(-2px);
        }

        /* Delete button */
        a[href*="delete"] {
            background: #e57373; /* soft red */
            color: white;
            box-shadow: 0 3px 6px rgba(0,0,0,0.15);
        }

        a[href*="delete"]:hover {
            background: #d32f2f; /* formal deeper red */
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <h1>Welcome to View Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['id']; ?></td>
                <td><?= $user['username']; ?></td>
                <td><?= $user['email']; ?></td>
                <td>
                    <a href="<?= site_url('user/update/'.$user['id']); ?>">Edit</a>
                    &nbsp;|&nbsp;
                    <a href="<?= site_url('user/delete/'.$user['id']); ?>" 
                       onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
