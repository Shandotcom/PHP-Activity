<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Delete_User</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tahoma:wght@400;700&display=swap" rel="stylesheet">
	<style>
		/* --- Y2K (Windows Error Dialog) Theme --- */
		:root {
			--bg-desktop: #3a6ea5; 
			--ui-gray: #c0c0c0; 
			--border-light: #ffffff;
			--border-dark: #808080;
			--text-main: #000000;
		}

		body { background-color: var(--bg-desktop); font-family: 'Tahoma', sans-serif; }
		
        /* Simulating the classic 3D container */
		.y2k-container {
			background-color: var(--ui-gray);
			border-style: solid;
			border-width: 2px;
			border-color: var(--border-light) var(--border-dark) var(--border-dark) var(--border-light);
            padding: 1px;
			box-shadow: 4px 4px 0 rgba(0,0,0,0.5);
            max-width: 400px;
            margin: 100px auto; /* Centered high up */
		}
		
		.card-header {
			background: linear-gradient(90deg, #000080, #0000c0);
			color: white; 
            font-weight: 700;
            padding: 3px 8px;
            font-size: 13px;
            margin-bottom: 0 !important;
		}
        
        .card-body {
            padding: 20px;
            background-color: #f0f0f0;
            color: var(--text-main);
        }

		.delete-alert {
            /* The message box area */
            font-weight: 700;
            display: flex;
            align-items: center;
		}
        
        .delete-alert h5 {
            font-weight: 700;
            margin: 0;
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
            width: 100px;
		}
        .btn:hover { background-color: #d8d8d8; }
        .btn:active {
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
            transform: translate(1px, 1px);
            box-shadow: none;
        }
        
        /* Simulating the Error Icon (X in a circle) */
        .error-icon {
            color: #ff0000; 
            font-size: 30px; 
            margin-right: 15px;
            text-shadow: 1px 1px 0 rgba(0,0,0,0.5);
            line-height: 1;
        }
	</style>
</head>
<body>
	<?php 
	if (!isset($_GET['id'])) { header("Location: index.php"); exit; }
	$getUserByID = getUserByID($pdo, $_GET['id']); 
	if (!$getUserByID) { header("Location: index.php"); exit; }
	?>
	
	<div class="y2k-container">
		<div class="card-header">
			<h4 class="mb-0">:: Error</h4>
		</div>
		<div class="card-body">
			<div class="delete-alert mb-4">
                <span class="error-icon">❌</span>
				<h5 class="flex-grow-1">Are you sure you want to delete the record for <?php echo htmlspecialchars($getUserByID['first_name']) . " " . htmlspecialchars($getUserByID['last_name']); ?>?</h5>
			</div>

            <div class="d-flex justify-content-end gap-2">
				<form action="handleForms.php?id=<?php echo htmlspecialchars($_GET['id']); ?>" method="POST">
					<input type="submit" name="deleteBtn" value="Yes" class="btn">
				</form>
				<a href="index.php" class="btn">No</a>
			</div>
		</div>
	</div>
</body>
</html>