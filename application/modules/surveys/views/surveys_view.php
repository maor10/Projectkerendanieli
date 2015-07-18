<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Keren Danieli</title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap-user.min.css" type="text/css">

        <!-- Custom Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/selectize/selectize.bootstrap3.css" type="text/css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.min.css" type="text/css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/creative.css" type="text/css">



    </head>

    <body id="page-top">

        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="#page-top">Keren Danieli</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="page-scroll" href="#about">About</a>
                            
                        </li>
                        <?php if($code == "0"):?>
                        <li>
                            <a class="page-scroll" href="#survey">Survey</a>
                        </li>
                        <?php endif;?>
                        <li>
                            <a class="page-scroll" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <header>
            <div class="header-content">
                <div class="header-content-inner">
                    <h1><?php if($code == "0"):?>Keren Danieli<?php endif; ?><?php if($code != "0"):?>Thank You<?php endif; ?></h1>
                    <hr>
                    <p>Lorem ipsum dolor. Sit amet semper qui lacinia gravida. Porttitor in arcu. Ante nunc pellentesque velit elit eu. Mauris diam duis. Luctus.</p>
                    <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">About Keren Danieli</h2>
                        <hr class="light">
                        <p class="text-faded">Lorem ipsum dolor. Sit amet semper qui lacinia gravida. Porttitor in arcu. Ante nunc pellentesque velit elit eu. Mauris diam duis. Luctus.LuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctusLuctus</p>
                        <a href="#" class="btn btn-default btn-xl">Get Started!</a>
                    </div>
                </div>
            </div>
        </section>

        <?php if($code == "0"):?>
        <section id="survey">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Survey</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <form method="post" action="<?php echo base_url(); ?>index.php/surveys/sendResponse">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="responsername">Name</label>
                            <input type="text" class="form-control" name="responsername" placeholder="Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="doctorid">Doctor/Nurse</label>
                            <select class="form-control" id="doctorid" name="doctorid" required>
                                <?php foreach ($Doctors as $doctor): ?>

                                    <option value="<?php echo $doctor["id"]; ?>"><?php echo $doctor["name"]; ?></option>

                                <?php endforeach; ?>
                            </select>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="hospital">Hospital/Clinic Name</label>
                            <input type="text" class="form-control" name="hospital" placeholder="Hospital" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="grade">Grade You'd Give This Doctor</label>
                            <select class="form-control" name="grade" required>
                                <?php for ($i = 1; $i <= 10; $i++): ?>

                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                <?php endfor; ?>   
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="responserid">Your ID (תעודת זהות)</label>
                            <input type="text" class="form-control" name="responserid" placeholder="ID" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="responsertype">Were you the:</label>
                            <select class="form-control" name="responsertype" required>
                                <option value="1">Patient</option>
                                <option value="2">Spouse of Patient</option>
                                <option value="3">Child of Patient</option>
                                <option value="4">Parent of Patient</option>
                                <option value="5">Friend of Patient</option>
                                <option value="6">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="phonenumber">Phone Number</label>
                            <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="explanation">Explain why you chose this doctor (optional)</label>
                            <textarea class="form-control" name="explanation"></textarea>
                        </div>
                        
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit" />
                </form>
                
            </div>
        </section>
        <?php endif;?>



        <section id="contact" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 text-center">
                        <h2 class="section-heading">Let's Get In Touch!</h2>
                        <hr class="primary">
                        <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                    </div>
                    <div class="col-lg-4 col-lg-offset-2 text-center">
                        <i class="fa fa-phone fa-3x wow bounceIn"></i>
                        <p>123-456-6789</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                        <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>bootstrap-user.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php echo base_url(); ?>JS/jquery.easing.min.js"></script>
        <script src="<?php echo base_url(); ?>JS/jquery.fittext.js"></script>
        <script src="<?php echo base_url(); ?>JS/wow.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url(); ?>JS/creative.js"></script>
        <script src="<?php echo base_url(); ?>JS/selectize.min.js"></script>
        <script>
            $('#doctorid').selectize();
        </script>
    </body>

</html>
