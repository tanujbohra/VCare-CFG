<!DOCTYPE html>
<html lang="en">
<head>
  <title>form</title>
  <link rel="stylesheet" href="styles/bootstrap.css" >
  <link rel="stylesheet" href="styles/bootstrap-theme.css">
  <link rel="stylesheet" href="styles/form-elements.css">
  <link rel="stylesheet" href="styles/form-style.css">
</head>
<body>
  <!-- Top content -->
  <div class="top-content">

      <div class="inner-bg">
          <div class="container">



              <div class="row">
                  <div class="col-sm-5">

                    <div class="form-box">
                      <div class="form-top">
                        <div class="form-top-left">
                          <h3>Login to BRRYB</h3>
                            <p>Enter username and password to log on:</p>
                        </div>
                        <div class="form-top-right">
                          <i></i>
                        </div>
                        </div>
                        <div class="form-bottom">
                      <form role="form" action="login.php" method="post" class="login-form">
                          <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input type="text" name="email" placeholder="Email..." class="email form-control" id="email">
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
                          </div>
                          <button type="submit" class="btn">Sign in!</button>
                      </form>
                    </div>
                  </div>

                <div class="social-login">
                      <h3>...or login with:</h3>
                      <div class="social-login-buttons">
                        <a class="btn btn-link-1 btn-link-1-facebook" href="#top">
                          <i></i> Facebook
                        </a>
                        <a class="btn btn-link-1 btn-link-1-twitter" href="#top">
                          <i"></i> Twitter
                        </a>
                        <a class="btn btn-link-1 btn-link-1-google-plus" href="#top">
                          <i></i> Google Plus
                        </a>
                      </div>
                    </div>

                  </div>

                  <div class="col-sm-1 middle-border"></div>
                  <div class="col-sm-1"></div>

                  <div class="col-sm-5">

                    <div class="form-box">
                      <div class="form-top">
                        <div class="form-top-left">
                          <h3>Sign up now</h3>
                            <p>Fill in the form below to get instant access:</p>
                        </div>
                        <div class="form-top-right">
                          <i></i>
                        </div>
                        </div>
                        <div class="form-bottom">
                      <form role="form" action="register.php" method="post" class="registration-form">
                        <div class="form-group">
                          <label class="sr-only" for="name">First name</label>
                            <input type="text" name="name" placeholder="First name..." class="fname form-control" id="name">
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="email">Email</label>
                            <input type="text" name="email" placeholder="Email..." class="email form-control" id="email">
                          </div>
                          <div class="form-group">
                            <label class="sr-only" for="password">Password</label>
                            <input type="password" name="password" placeholder="Password..." class="password form-control" id="password">
                          </div>
                          <button type="submit" class="btn">Sign me up!</button>
                      </form>
                    </div>
                    </div>

                  </div>
              </div>

          </div>
      </div>

  </div>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">

        <div class="col-sm-8 col-sm-offset-2">
          <div class="footer-border"></div>
            <p>© BRRYB 2017 Company, Inc. · <a href="#top">Privacy</a> · <a href="#top">Terms</a> A project by:<a href="#top">Nisahd Kane</a> & <a href="https://www.google.co.in/search?q=tanuj+bohra&espv=2&source=lnms&tbm=isch&sa=X&ved=0ahUKEwjc2r_zq63TAhVKu48KHdJACw4Q_AUIBygC&biw=1440&bih=826#imgrc=64YQFWh7DyqdwM:">Tanuj Bohra</a></p>
        </div>

      </div>
    </div>
  </footer>
  <script src="scripts/jquery.js"></script>
  <script src="scripts/bootstrap.js"></script>
</body>
</html>
