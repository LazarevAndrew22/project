<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $title; ?></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="/public/styles/bootstrap.css" rel="stylesheet">
        <link href="/public/styles/main.css" rel="stylesheet">
        <script src="/public/scripts/jquery.js"></script>
        <script src="/public/scripts/form.js"></script>
        <script src="/public/scripts/popper.js"></script>
        <script src="/public/scripts/bootstrap.js"></script>
        <style>
            p.clip {
                white-space: nowrap;
                overflow: hidden;
                padding: 0px;
                text-overflow: ellipsis;
            }
            small.clip {
                white-space: nowrap;
                overflow: hidden;
                padding: 0px;
                text-overflow: clip;
            }
            body {
                margin: 0;
            }
            .myclass {
                margin: 1%;
                align= left;
                padding: 5px;
            }
            textarea.class1{
                textarea{width:auto}
            }


        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
            <div class="container">
                <?php if(isset($_SESSION['userEmail'])):?>
                <a class="navbar-brand" style="color:#ffffff"><?php echo $_SESSION['userEmail'];?></a>
                <?php else:?>
                <a class="navbar-brand" style="color:#ffffff">MP</a>
                <?php endif;?>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto nav justify-content-center">
                        <?php if (isset($_SESSION['userEmail'])): ?>
                            <ul class="nav justify-content-center">
                                <li class="nav-item">
                                    <a class="nav-link nav-pills" href="/account/inbox" style="color:#ffffff">Inbox <span class="badge badge-primary badge-pill"><?php echo count($letters)?></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link nav-pills" href="/account/sent" style="color:#ffffff">Sent <span class="badge badge-primary badge-pill"><?php echo count($sentLetters)?></span></a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link nav-pills" data-toggle="modal" data-target="#newMessage" href="#newMessage" style="color:#ffffff"> New message</a>
                                </li>
                            </ul>
                            <li class="nav-item">
                                <a  class="nav-link" href="/account/logout" style="color:#ffffff">Log out </a>
                            </li>

                        <?php elseif ($this->route['action'] === 'login'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/register">Registration</a>
                            </li>
                        <?php elseif ($this->route['action'] === 'register'): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/login">Login</a>
                            </li>
                        <?php else:?>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/register">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/account/login">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="myclass">
            <?php echo $content; ?>
        </div>



        <br><div class="modal fade" id="newMessage" tabindex="1" role="dialog" aria-labelledby="newMessageLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newMessageLabel">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/account/message" method="post">
                            <div class="form-group">
                                <label for="recipient" class="col-form-label">Recipient:</label>
                                <input type="text" class="form-control" id="recipient" name="recipient">
                            </div>
                            <div class="form-group">
                                <label for="theme" class="col-form-label">Theme</label>
                                <input type="text" class="form-control" id="theme" name="theme">
                            </div>
                            <div class="form-group">
                                <label for="message" class="col-form-label">Message:</label>
                                <textarea class="form-control" cols="10" rows="20" wrap="hard"  id="message" name="message"></textarea>
                            </div>
                            <button type="submit" name = "send" id="send" class="btn btn-primary">Send message</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>

