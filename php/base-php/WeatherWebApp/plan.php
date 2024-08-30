<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./css/style.css" />
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
  <title>Weather App</title>
  <script src="./javascript/script.js"></script>
</head>

<body>
  <?php
  include './components/header.php';
  ?>
  <main class="content">

    <div class="promo_wrapper">
      <div class="background">
        <span class="bubble one"></span>
        <span class="bubble two"></span>
        <span class="bubble three"></span>
        <span class="bubble four"></span>
        <span class="bubble five"></span>
        <span class="bubble six"></span>
        <span class="bubble seven"></span>
        <span class="bubble eight"></span>
        <span class="bubble nine"></span>
        <span class="bubble ten"></span>
      </div>
      <div class="center">
        <div class="todo">
          <h2>
            To-Do List
            <img src="./assets/icons/notebook.png" alt="notebook" />
          </h2>
          <div class="field">
            <input type="text" id="input_task" placeholder="Add Your Task..." />
            <button onclick="addTask()">Add</button>
          </div>
          <ul id="task_list"></ul>
        </div>
      </div>
    </div>
  </main>
  <?php
  include './components/footer.php';
  ?>
  <script src="./javascript/todoList.js"></script>
</body>

</html>