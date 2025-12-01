<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dev_Registry_V98</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tahoma:wght@400;700&display=swap" rel="stylesheet">
	<style>
		/* --- Y2K (Windows 98/XP) Corporate Theme --- */
		:root {
			--bg-desktop: #3a6ea5; /* Standard Windows Desktop Blue */
			--ui-gray: #c0c0c0; /* Windows UI Gray */
			--border-light: #ffffff;
			--border-dark: #808080;
			--text-main: #000000;
			--accent-blue: #0000ff; /* Classic hyperlink blue */
			--accent-save: #008000; /* Green for success */
			--font-main: 'Tahoma', sans-serif;
		}
		
		body { 
            background-color: var(--bg-desktop); 
            color: var(--text-main); 
            font-family: var(--font-main);
            padding-top: 50px;
        }

        h1 { 
            font-size: 20px; 
            font-weight: 700;
            color: var(--text-main);
            background-color: var(--ui-gray);
            border: 2px solid #000;
            padding: 5px;
            margin-bottom: 20px !important;
            /* 3D Title Bar Look */
            border-top: 3px solid #000080; 
            border-bottom: 3px solid #000080;
            color: white;
            background: linear-gradient(90deg, #000080, #0000c0);
        }
        
        /* Simulating the classic 3D container */
        .y2k-container {
            background-color: var(--ui-gray);
            border-style: solid;
            border-width: 2px;
            border-color: var(--border-light) var(--border-dark) var(--border-dark) var(--border-light);
            padding: 10px;
            box-shadow: 4px 4px 0 rgba(0,0,0,0.5); /* Heavy shadow for depth */
            margin-bottom: 30px;
        }

        .y2k-panel {
            background-color: var(--ui-gray);
            border-style: solid;
            border-width: 2px;
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
            padding: 10px;
            margin-top: 15px;
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
		}
        .btn:hover {
            background-color: #d8d8d8;
        }
        .btn:active {
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
            transform: translate(1px, 1px);
            box-shadow: none;
        }
        
        .btn-action {
             /* Green highlight for main action */
            background-color: #008000; 
            color: white;
            border-color: #008000 #005500 #005500 #008000;
            text-shadow: none;
        }
        .btn-action:hover {
            background-color: #009000;
        }

		.btn-edit, .btn-delete {
            width: 70px; /* Uniform width for actions */
        }

		/* --- Table Styles --- */
		.table-responsive {
            border-style: solid;
            border-width: 2px;
            border-color: var(--border-dark) var(--border-light) var(--border-light) var(--border-dark);
            margin-top: 15px;
        }
		.table {
			background-color: #ffffff;
			color: var(--text-main);
            border: 1px solid var(--border-dark);
		}

		.table-head-custom {
			background-color: #000080; 
			color: white;
            font-weight: 700;
		}
        
        .table-hover tbody tr:hover {
			background-color: #f0f0f0 !important; 
		}
        
        td {
            border-top: 1px solid #d0d0d0 !important;
            font-size: 13px;
        }

        .section-header {
            font-weight: 700;
            font-size: 14px;
            color: #000080;
            margin-top: 15px;
            padding-bottom: 5px;
            border-bottom: 1px solid #000080;
        }
	</style>
</head>
<body>

	<div class="container mt-5" style="max-width: 900px;">
		<h1 class="text-center">Web Design Registration</h1>
		
		<div class="y2k-container">
            <h5 class="section-header">Registration Form</h5>
            
            <div class="y2k-panel">
				<form action="handleForms.php" method="POST" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">First Name:</label>
                        <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Last Name:</label>
                        <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">E-mail Address:</label>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Gender:</label>
                        <select name="gender" class="form-select" required>
                            <option value="" disabled selected>Select a gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Full Address:</label>
                        <input type="text" name="address" class="form-control" placeholder="1234 Main St" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">State/Region:</label>
                        <input type="text" name="state" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nationality:</label>
                        <input type="text" name="nationality" class="form-control" required>
                    </div>
                    
                    <div class="col-12 mt-4 text-start">
                        <input type="submit" name="insertBtn" value="REGISTER " class="btn btn-action">
                    </div>
				</form>
			</div>
		</div>

		<h5 class="section-header">System Logs</h5>
		
		<div class="table-responsive">
			<table class="table table-hover mb-0">
				<thead class="table-head-custom">
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Gender</th>
						<th>Address</th>
						<th>State</th>
						<th>Nationality</th>
						<th>Date Added</th>
						<th>Functions</th>
					</tr>
				</thead>
				<tbody>
					<?php $seeAllUser = getAllUsers($pdo); ?>
					<?php foreach ($seeAllUser as $row) { ?>
					<tr>
						<td><?php echo htmlspecialchars($row['id']); ?></td>
						<td><?php echo htmlspecialchars($row['first_name']); ?></td>
						<td><?php echo htmlspecialchars($row['last_name']); ?></td>
						<td><?php echo htmlspecialchars($row['email']); ?></td>
						<td><?php echo htmlspecialchars($row['gender']); ?></td>
						<td><?php echo htmlspecialchars($row['address']); ?></td>
						<td><?php echo htmlspecialchars($row['state']); ?></td>
						<td><?php echo htmlspecialchars($row['nationality']); ?></td>
						<td><?php echo htmlspecialchars($row['date_added']); ?></td>
						<td style="min-width: 150px;">
							<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit">EDIT</a>
							<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete">DELETE</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>