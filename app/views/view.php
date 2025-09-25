<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
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

        /* 🌸 Create Button Style */
.create-container {
    text-align: center;
    margin: 20px 0 25px 0; /* top and bottom spacing */
}

.create-btn {
    display: inline-block;
    padding: 10px 18px;
    background: linear-gradient(135deg, #d670a7, #b83280);
    color: white;
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.3s ease, transform 0.2s ease;
    text-align: center;
}

.create-btn:hover {
    background: linear-gradient(135deg, #c05391, #9d296d);
    transform: translateY(-2px);
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

<div style="text-align: center; margin-bottom: 15px;">
    <a href="<?= site_url('user/create') ?>" class="create-btn">+ Create New User</a>
</div>

<div class="container mt-3 ">
	<form action="<?=site_url('view');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>


    <h1>Welcome to View Page</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php foreach ($all as $user): ?>
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
    
    <?php
	echo $page;?>
	</div>


</body>
</html>