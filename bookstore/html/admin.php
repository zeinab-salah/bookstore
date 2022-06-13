<?php
    require '../php/connection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" href="../css/style-admin.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <script>
        function openAddForm() {
          document.getElementById("addform").style.display = "block";
          document.getElementById("updateform").style.display = "none";
          document.getElementById("deleteform").style.display = "none";
          document.getElementById("userform").style.display = "none";
          document.getElementById("orderform").style.display = "none";
        }
        function openUpdateForm() {
          document.getElementById("updateform").style.display = "block";
          document.getElementById("addform").style.display = "none";  
          document.getElementById("deleteform").style.display = "none";
          document.getElementById("userform").style.display = "none";
          document.getElementById("orderform").style.display = "none";
        }
        function opendeleteForm() {
          document.getElementById("deleteform").style.display = "block";
          document.getElementById("updateform").style.display = "none";
          document.getElementById("addform").style.display = "none";  
          document.getElementById("userform").style.display = "none";
          document.getElementById("orderform").style.display = "none";
        }
        function openusersForm() {
          document.getElementById("userform").style.display = "block";
          document.getElementById("updateform").style.display = "none";
          document.getElementById("addform").style.display = "none";  
          document.getElementById("deleteform").style.display = "none";
          document.getElementById("orderform").style.display = "none";
        }
        function openorderForm() {
          document.getElementById("orderform").style.display = "block";
          document.getElementById("updateform").style.display = "none";
          document.getElementById("addform").style.display = "none";  
          document.getElementById("deleteform").style.display = "none";
          document.getElementById("userform").style.display = "none";
        }
        </script>
            <header>
                <h1>My Book Store</h1>
            </header>
            <nav class="navbar">
                <ul >
                   <li><a href="index.php" > Home </a></li>
                   <li><a href="#" onclick="openAddForm()" >Add Books</a></li> 
                   <li><a href="#" onclick="openUpdateForm()">Update Books</a></li> 
                   <li><a href="#" onclick="opendeleteForm()">Delete Books</a></li>
                   <li><a href="#" onclick="openusersForm()">Show Users</a></li>
                   <li><a href="#" onclick="openorderForm()">Check Orders</a></li>
                </ul>
            </nav>
            <main>
                <!--Add Book-->
                <section class="add-sec" id="addform">
                    <form action="../php/addbooks.php" method="post" enctype="multipart/form-data">
                        <label for="format">Format</label><br/>
                        <select id="format" name="formatt">
                          <option value="pdf">PDF</option>
                          <option value="audio">AUDIO</option>
                        </select>
                        <label for="catogary">Catogary</label><br/>
                        <select id="catogary" name="catrgory">
                          <option value="History">History</option>
                          <option value="Math">Math</option>
                          <option value="Novels">Novels</option>
                          <option value="English">English</option>
                          <option value="Art">Art</option>
                        </select>
                        <input type="text" name="author" placeholder="Author Name" required>
                        <input type="text" name="bookname" placeholder="Book Name" required>
                        <label for="date">
                            Release Date<br/>
                            <input type="date" name="releasedate" id="date" required>
                        </label>
                        <!-- <input type="number" name="weightt" placeholder="Weight" required> -->
                        <input type="number" name="price" placeholder="Price" required>
                        <label><br/>
                            Select Book File
                            <input type="file" name="file" accept="application/pdf, audio/mp3 , audio/*" required>
                        </label>
                        <label><br/>
                            Select Book Cover Image
                            <input type="file" name="file1" accept="jpg, .jpeg, .png" required>
                        </label>
                        <input type="submit" name="save" value="Save" class="btn-save">
                    </form>
                </section>
                <!--Update Book-->
                <section class="update-sec" id="updateform">
                    <form action="#" method="post">
                        <label for="catogary">Catogary</label><br/>
                        <select id="catogary" name="catogary">
                          <option value="pdf">History</option>
                          <option value="audio">Math</option>
                          <option value="pdf">Novels</option>
                          <option value="audio">English</option>
                          <option value="audio">Art</option>
                        </select>
                        <input type="submit" name="ok" value="OK" class="btn-save">
                    </form>
                    <table id="edit-data">
                            <tr>
                            <th>ID </th>
                            <th>Format </th>
                            <th>Catrgory </th>
                            <th>Author </th>
                            <th>Book Name </th>
                            <th>Release Date </th>
                            <th>Weight </th>
                            <th>Price </th>
                            <th>Book File </th>
                         </tr>
                        <?php
                        $sql = "SELECT * FROM books";
                        $result = mysqli_query($conn, $sql);
                        $rows_count = mysqli_num_rows($result);
                        if ($rows_count > 0) {
                            while ( $row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['formatt'] ?></td>
                                <td><?= $row['catrgory'] ?></td>
                                <td><?= $row['author'] ?></td>
                                <td><?= $row['bookname'] ?></td>
                                <td><?= $row['releasedate'] ?></td>
                                <td><?= $row['weightt'] ?></td>
                                <td><?= $row['price'] ?></td>
                                <td><?= $row['bookfile'] ?></td>
                                <td><a href="#">UPDATE</a></td>
                            </tr>
                        <?php }
                         }
                        ?>
                    </table>
                </section>
               <!--Delete Book-->
                <section class="delete-sec" id="deleteform">
                    <form>
                        <label for="catogary">Catogary</label><br/>
                        <select id="catogary" name="catogary">
                          <option value="pdf">History</option>
                          <option value="audio">Math</option>
                          <option value="pdf">Novels</option>
                          <option value="audio">English</option>
                          <option value="audio">Art</option>
                        </select>
                        <input type="submit" name="ok" value="OK" class="btn-save">
                    </form>
                    <table>
                        <th>
                            <td>A</td>
                        </th>
                        <tr>
                            <td>A</td>
                            <td><button>Delete</button></td>
                        </tr>
                    </table>
                </section>
                <!--Show Users-->

                <section class="show-users" id="userform">
                    <table>
                        <tr>
                            <th>ID </th>
                            <th>Group ID </th>
                            <th>User Image </th>
                            <th>Phone </th>
                            <th>Email </th>
                            <th>Passwrd </th>
                         </tr>
                        <?php
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($conn, $sql);
                        $rows_count = mysqli_num_rows($result);
                        if ($rows_count > 0) {
                            while ( $row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['groupid'] ?></td>
                                <td><?= $row['userimage'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['passwd'] ?></td>
                            </tr>
                        <?php }
                         }
                        ?>
                    </table>
                </section>

                <!--Show Orders-->
                <section class="show-orders" id="orderform">
                    <table>
                        <th>
                            <td>A</td>
                        </th>
                        <tr>
                            <td>A</td>
                            <td>B</td>
                        </tr>
                    </table>
                </section>
            </main>

        
    </body>
</html>