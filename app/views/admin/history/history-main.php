<?php
// if model->page is set, put it into $page variable.
if (isset($model) && isset($model->page)) {
  $page = $model->page;
} else {
  $page = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.tiny.cloud/1/ue0ws4ot9s8gqyiv927li7gcsp3a9hwb2o6hxmmsgx146jdm/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

  <script>
    tinymce.init({
      /* replace textarea having class .tinymce with tinymce editor */
      selector: "#mytextarea",
      plugins: 'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking image save table contextmenu directionality emoticons template paste textcolor',
    });
  </script>
</head>

<body>
  <div class="justify-content-center col-sm-12 col-md-10 col-lg-8 mx-auto">
    <h1>Edit History-main</h1>
    <form action="/admin/history/editSubmit" method="POST">
      <div class="form-floating mb-3">
        <textarea id="mytextarea" name="tinyMCEform">
          <?php
          // if the user is creating a new page, show the following message
          if ($page == null)
            echo "<p> Create your new page. </p>";
          else {
            // if the user is editing an existing page, show the content of that page.
            echo $page->getBodyContentHTML();
          }
          ?>
        </textarea>
      </div>
      <label>page title: </label>  
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="pageTitle" id="pageTitle" readonly <?php
        // if we are showing a page for editing, fill the page tile field.
        if ($page != null)
          echo "value=" . $page->getTitle();
        ?>>
      </div>
      <?php
      // if we are updating an existing page, we create a hidden input and give its value te pageId. So, when the form is submitted to the server, we know which pageId we are updating or deleting.
      if ($page != null) {
        $pageId = $page->getId();
        ?>
        <label>page id: </label>  
        <div class="form-floating mb-3">
        <input readonly class="form-control" name="pageID" id="pageID" value=<?php echo $pageId; ?>>
        </div>
        <?php
      }
      ?>
      <div class="form-floating mb-3">
        <button class="btn mb-2" name="formSubmit" type="submit">
          Update
        </button>
      </div>
    </form>
  </div>
</body>


</html>