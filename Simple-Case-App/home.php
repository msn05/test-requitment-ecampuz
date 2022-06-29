<?php
session_start();
require_once('db.php');
if (!$_SESSION['LogIn'] == true)
  header('location:index.php')
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.98.0">
  <title>Fixed top navbar example · Bootstrap v5.2</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">


  <link href="https://getbootstrap.com/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }

    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }

    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }

    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }

    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/navbar-top-fixed.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Test E-Campuz</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <button class="btn btn-success" id="logout" type="submit">Logout</button>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1>Dashboard</h1>
      <hr>
      <form action="crud.php" method="POST" id="create">
        <div class="row">
          <div class="mb-3 col-sm-3">
            <label for="exampleFormControlInput1" class="form-label">Instance</label>
            <input type="text" class="form-control " name="instance" id="exampleFormControlInput1" placeholder="PT BPJS ">
          </div>
          <div class="mb-3 col-sm-9">
            <label for="exampleFormControlTextarea1" class="form-label">Descriptions</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"> Pendanaan kesehatan </textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary save float-end">Save</button>
      </form>
      <hr>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Instance</th>
            <th scope="col">Descriptions</th>
            <th scope="col">Users created</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          // get data with object mysqli
          $crud = mysqli_query($conn, 'select *,crud.id as cid from crud left join users on users.id = crud.user_id  order by crud.id asc ');
          while ($Data = mysqli_fetch_array($crud)) {
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $Data['name']; ?></td>
              <td><?= $Data['description']; ?></td>
              <td><?= $Data['email']; ?></td>
              <td>
                <button type="button" class="btn btn-danger save float-end" id="Delete" data-id="<?= $Data['cid']; ?>">Delete</button>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>
  </main>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>


  <script>
    $(document).ready(function() {
      $('#create').on('submit', function(e) {
        e.preventDefault()
        let form = new FormData(this);
        $.ajax({
          url: 'crud.php?type=create',
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          dataType: "JSON",
        }).done(function(data) {
          alert(data.message);
          location.reload();
        }).fail(function(xhr, status, responseJSON) {
          alert(xhr.responseJSON.message)
        })
      })
      $(document).on('click', '#Delete', function(e) {
        let id = $(this).data('id');
        console.log(id)
        if (confirm('Are you sure deleted data this ?')) {
          $.ajax({
            url: 'crud.php?type=delete',
            type: 'POST',
            data: {
              id: id
            },
            cache: false,
            dataType: 'JSON'
          }).done(function(data) {
            alert(data.message)
          }).fail(function(xhr, status, responseJSON) {
            alert(xhr.responseJSON.message)
          })
          location.reload()
        } else {
          return false
        }
      })
      $('#logout').on('click', function(e) {
        e.preventDefault()
        $.ajax({
          url: 'login.php?type=logout',
          type: 'POST',
        }).done(function(data) {
          alert(data.message);
          window.location.href = "index.php";
        }).fail(function(xhr, status, responseJSON) {
          alert(xhr.responseJSON.message)
        })
      })
    })
  </script>

</body>

</html>