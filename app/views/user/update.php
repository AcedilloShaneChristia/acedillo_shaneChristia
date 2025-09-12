<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User/Update</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fdf5f9; /* blush background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #444;
        }

        .form-container {
            background: #fff;
            padding: 35px 40px;
            border-radius: 12px;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.08);
            width: 360px;
            border-top: 5px solid #e09cb4; /* soft pink accent */
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 20px;
            color: #b83280; /* deep rose pink */
            font-weight: 600;
        }

        label {
            font-weight: 500;
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
            font-size: 14px;
            color: #555;
        }

        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #e3c3d4;
            border-radius: 6px;
            outline: none;
            font-size: 14px;
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            background: #fffafc;
        }

        input[type="text"]:focus, input[type="email"]:focus {
            border-color: #d670a7;
            box-shadow: 0 0 6px rgba(214, 112, 167, 0.4);
        }

        input[type="submit"] {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #d670a7, #b83280);
            color: white;
            font-size: 15px;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background: linear-gradient(135deg, #c05391, #9d296d);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>🌸 Update User 🌸</h1> <!-- marker so you know this is the new file -->
        <form method="post" action="<?= site_url('user/update/'.$user['id']) ?>">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" 
                   value="<?= html_escape($user['username']) ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" 
                   value="<?= html_escape($user['email']) ?>" required>

            <input type="submit" value="Update User">
        </form>
    </div>
</body>
</html>
