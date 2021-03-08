            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        DJ's
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                <?php
                if(isset($deleted) && $deleted && isset($_GET['delete'])) {
                    echo '<div class="alert alert-success">Het account is verwijderd.</div>';
                    echo '<meta http-equiv="refresh" content="1; url=djs.php" />';
                }

                ?>


                                    <table class="table table-striped">
                                        <tbody><tr>
                                            <th style="width: 10px">#</th>
                                            <th>Gebruikersnaam</th>
                                            <th>Email</th>
                                            <th>Voornaam</th>
                                            <th>Achternaam</th>
                                            <th>Acties</th>
                                        </tr>
                                        <?php
                                        while($aFetch = DB::Fetch($query)) { 
                                        echo '<tr>
                                            <td>' . htmlentities($aFetch['id']) . '</td>
                                            <td>' . htmlentities($aFetch['username']) . '</td>
                                            <td>' . htmlentities($aFetch['email']) . '</td>
                                            <td>' . htmlentities($aFetch['firstname']) . '</td>
                                            <td>' . htmlentities($aFetch['lastname']) . '</td>

                                            <td>
                                                <a href="editdj.php?id=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a href="djs.php?delete=' . $aFetch['id'] . '"><span class="glyphicon glyphicon-remove"></span></a>
                                            </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody></table>
                                    <br /><br />
                                    <a href="adddj.php"><button class="btn btn-primary">DJ toevoegen</button></a>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->