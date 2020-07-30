<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Document</title>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center mt-5">
        <div class="col-6">
          <form>
            <div class="form-group">
              <span class="text-success" id="message"></span>
            </div>
            <div class="form-group">
              <label for="username">User Name</label>
              <input 
                type="text" 
                class="form-control" 
                placeholder="Enter Name"
                id="name"
                name="Name"
              >

              <span class="text-danger" id="name-err"></span>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input 
                type="text" 
                class="form-control" 
                id="email" 
                placeholder="example@mail.com"
                name="email"
              >

              <span class="text-danger" id="email-err"></span>
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input 
                type="text" 
                class="form-control" 
                id="phone" 
                placeholder="380123456789"
                name="phone"
              >

              <span class="text-danger" id="phone-err"></span>
            </div>
            <button
              type="submit"
              class="btn btn-primary"
              id="submit-btn"
            >
              Send
            </button>
          </form>
        </div>
      </div>
    </div>

    <script src="src/index.js"></script>
  </body>
</html>
