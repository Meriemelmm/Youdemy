<?php 
 require '../classes/admin.php';
 require '../classes/cour.php';
 require '../classes/tag_course.php';
 if (!isset($_SESSION['username'])) {
    header('Location: ../auth/login.php');
    exit();
} 

 $course = new course();

 if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove']) && isset($_POST['cours_id'])) {
        try {
            $coursid = $_POST['cours_id'];
            $course->removeCour($coursid);
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
}

$admin = new admin();
$categories = $admin->showCategorie();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
            color: #555;
        }

        select {
            width: 40%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #fafafa;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        select:focus {
            border-color: #007bff;
            outline: none;
            background-color: #e9f1fb;
        }

        option {
            padding: 10px;
            background-color: #fff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php include '../side/sideAdmin.php';?>

<main class="main-content">
    <div class="container">
        <div class="header">
            <div>
                <h2 class="title">Gérer cours</h2>
                <p class="subtitle">Liste cours</p>
            </div>
        </div>
        <form method="GET" action="">
            <label for="choix">Choisissez une catégorie :</label>
            <select id="choix" name="choix" onchange="this.form.submit()">
                <option value="">-- Sélectionner une catégorie --</option>
                <?php foreach ($categories as $categorie): ?>
                    <option value="<?php echo htmlspecialchars($categorie['categorie_name']); ?>"
                            <?php if (isset($_GET['choix']) && $_GET['choix'] == $categorie['categorie_name']) {
                                echo 'selected';
                            } ?>>
                        <?php echo htmlspecialchars($categorie['categorie_name']); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form><br><br>

        <div class="courses-table">
            <table>
                <thead>
                    <tr>
                        <th>Teacher</th>
                        <th>Titre de cours</th>
                        <th>description</th>

                        <th>Catégorie</th>
                        <th>content</th>

                        <th>Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $courses = $course->showCour();
                    $choix = isset($_GET['choix']) ? $_GET['choix'] : '';

                    foreach ($courses as $course):
                        if ($course['vedio_content'] == NULL):
                            if (empty($choix) || $course['categorie_name'] == $choix): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($course['username']); ?></td>
                                    <td><?php echo htmlspecialchars($course['cours_title']); ?></td>
                                    <td><?php echo htmlspecialchars($course['cours_description']); ?></td>
                                    <td><?php echo htmlspecialchars($course['categorie_name']); ?></td>
                                    <td><?php echo htmlspecialchars(substr($course['text_content'], 0, 100)); ?></td>
                                    <td>
                                        <?php
                                        $coursid = $_SESSION['cours_id'] = $course['cours_id'];
                                        $tags = (new tag_course)->tags_course($coursid);
                                        foreach ($tags as $tag) {
                                            echo htmlspecialchars($tag['tag_name']) . "<br>";
                                        }
                                        ?>
                                    </td>
                                    <td class="actions">
                                        <form method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce cours ?');">
                                            <input type="hidden" name="cours_id" value="<?php echo htmlspecialchars($course['cours_id']); ?>">
                                            <button style="background:transparent; border:none;" type="submit" name="remove" class="delete-btn">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endif;
                        endif;
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

</body>
</html>
