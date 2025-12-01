<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update_User_Config</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tahoma:wght@400;700&display=swap" rel="stylesheet">
	<style>
		/* --- Y2K (Windows 98/XP) Corporate Theme --- */
		:root {
			--bg-desktop: #3a6ea5; 
			--ui-gray: #c0c0c0; 
			--border-light: #ffffff;
			--border-dark: #808080;
			--text-main: #000000;
			--accent-save: #008000; 
		}

		body { 
            background-color: var(--bg-desktop); 
            color: var(--text-main); 
            font-family: 'Tahoma', sans-serif;
        }

        /* Simulating the classic 3D container */
        .y2k-container {
            background-color: var(--ui-gray);
            border-style: solid;
            border-width: 2px;
            border-color: var(--border-light) var(--border-dark) var(--border-dark) var(--border-light);
            padding: 1px; /* Inner container is usually flush */
            box-shadow: 4px 4px 0 rgba(0,0,0,0.5); 
        }

		.card-header {
			background: linear-gradient(90deg, #000080, #0000c0);
			color: white; 
			border-bottom: 1px solid #000080;
            font-weight: 700;
            padding: 3px 8px;
            font-size: 13px;
            margin-bottom: 0 !important;
            border-radius: 0;
		}
        
        .card-body {
            padding: 15px;
        }

		/* --- Form Elements (Inset Look) --- */
		.form-control, .form-select {
			background-color: #ffffff;
			border-style: solid;
            border-width: 2px;
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
			color: var(--text-main);
            border-radius: 0;
            padding: 3px;
            margin-top: 2px;
            font-size: 13px;
		}

		.form-control:focus, .form-select:focus {
			background-color: #ffffff;
			border-color: #000000;
			box-shadow: inset 0 0 0 1px #000000;
		}
        
        .form-label {
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 0;
            font-size: 13px;
        }
        
        /* --- Button Styles (Chunky 3D Look) --- */
		.btn {
            background-color: var(--ui-gray);
            border-style: solid;
            border-width: 2px;
            border-color: var(--border-light) var(--border-dark) var(--border-dark) var(--border-light);
            color: var(--text-main);
            font-weight: 700;
            border-radius: 0;
            padding: 3px 15px;
            font-size: 13px;
            transition: none;
            text-shadow: 1px 1px #ffffff;
            width: 100px; /* Standard Button Width */
		}
        .btn:hover {
            background-color: #d8d8d8;
        }
        .btn:active {
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
            transform: translate(1px, 1px);
            box-shadow: none;
        }
        
        .btn-save {
             /* Green highlight for main action */
            background-color: var(--accent-save); 
            color: white;
            border-color: #008000 #005500 #005500 #008000;
            text-shadow: none;
        }
        .btn-save:hover {
            background-color: #009000;
        }

	</style>
</head>
<body>
	<?php 
	if (!isset($_GET['id'])) {
		header("Location: index.php");
		exit;
	}

	$getUserByID = getUserByID($pdo, $_GET['id']); 

	if (!$getUserByID) {
		header("Location: index.php");
		exit;
	}
	?>

	<div class="container mt-5" style="max-width: 450px;">
		<div class="y2k-container">
			<div class="card-header">
				<h4 class="mb-0">Edit Details (ID: <?php echo htmlspecialchars($getUserByID['id']); ?>)</h4>
			</div>
			<div class="card-body">
				<form action="handleForms.php?id=<?php echo htmlspecialchars($getUserByID['id']); ?>" method="POST">
					<div class="mb-3">
						<label class="form-label">First Name:</label>
						<input type="text" name="first_name" class="form-control" value="<?php echo htmlspecialchars($getUserByID['first_name']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Last Name:</label>
						<input type="text" name="last_name" class="form-control" value="<?php echo htmlspecialchars($getUserByID['last_name']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Email:</label>
						<input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($getUserByID['email']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Gender:</label>
						<input type="text" name="gender" class="form-control" value="<?php echo htmlspecialchars($getUserByID['gender']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Address:</label>
						<input type="text" name="address" class="form-control" value="<?php echo htmlspecialchars($getUserByID['address']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">State:</label>
						<input type="text" name="state" class="form-control" value="<?php echo htmlspecialchars($getUserByID['state']); ?>">
					</div>
					<div class="mb-3">
						<label class="form-label">Nationality:</label>
						<input type="text" name="nationality" class="form-control" value="<?php echo htmlspecialchars($getUserByID['nationality']); ?>">
					</div>
					
					<div class="d-flex justify-content-end gap-2 mt-4">
						<a href="index.php" class="btn">Cancel</a>
						<input type="submit" name="editBtn" value="OK" class="btn btn-save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>