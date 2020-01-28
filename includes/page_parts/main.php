<main>
<?php
    if (isset($_GET['page']) && $_GET['page'] != NULL) {
        
        switch($_GET['page']) {
            case '1':
                // Tips
                break;
            case '2':
                // Tools
                break;
            case '3':
                // Wiki
                break;
            case '4':
                // Planning
                break;
            case  '5':
                // Logs
                break;
            case '6':
                // Progress
                break;
            case '7':
                include('includes/pages/settings/main.php');
                break;
            case '8':
                // Console
                break;
            case '9':
                include('includes/pages/login/main.php');
                break;
            default:
                include('includes/pages/home/main.php');
                break;
        }

    } else {
        include('includes/pages/home/main.php');
    }
?>
</main>