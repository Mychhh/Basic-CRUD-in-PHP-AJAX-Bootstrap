<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <title>Online Library</title>
</head>
<body>
    
    <div class="container"><br>
        <div class="row">
            <div class="col-9">
                <h1>Online Library</h1>
            </div>
            <button type="button" class="col-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#add_modal">Add new Books</button>
        </div>
        <input id="myInput" type="text" class="form-control w-25" placeholder="Search..">
        <div><br>
            <table class="table table-bordered">
                <thead class="bg-warning">
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Publisher</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody id="table">
                    <!-- Data from the DB -->
                </tbody>
            </table>
        </div>

        <!-- Add new books modal -->
        <div class="modal fade" id="add_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Add new book</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="#">
                            <label for="add_title">Title: </label>
                            <input type="text" name="add_title" id="add_title" class="form-control" required>
                            <label for="add_author">Author: </label>
                            <input type="text" name="add_author" id="add_author" class="form-control" required>
                            <label for="add_date">Date : </label>
                            <input type="date" name="add_date" id="add_date" class="form-control" required>
                            <label for="add_pub">Publisher : </label>
                            <input type="text" name="add_pub" id="add_pub" class="form-control" required>
                            <label for="add_genre">Genre</label>
                            <select type="text" name="add_genre" id="add_genre" class="form-control" required>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="add-save" id="add-save">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Add new books modal -->

        <!-- View Modal -->
        <div class="modal fade" id="view_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>View book details</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="#">
                            <label for="view_title">Title: </label>
                            <input type="text" name="view_title" id="view_title" class="form-control" disabled>
                            <label for="view_author">Author: </label>
                            <input type="text" name="view_author" id="view_author" class="form-control" disabled>
                            <label for="view_date">Date : </label>
                            <input type="date" name="view_date" id="view_date" class="form-control" disabled>
                            <label for="view_pub">Publisher : </label>
                            <input type="text" name="view_pub" id="view_pub" class="form-control" disabled>
                            <label for="view_genre">Genre</label>
                            <select type="text" name="view_genre" id="view_genre" class="form-control" disabled>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of View Modal -->

        <!-- Edit Modal -->
        <div class="modal fade" id="edit_modal" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit book details</h4>
                    </div>
                    <div class="modal-body">
                        <!-- Form -->
                        <form action="#">
                            <input type="hidden" name="edit_id" id="edit_id" class="form-control">
                            <label for="edit_title">Title: </label>
                            <input type="text" name="edit_title" id="edit_title" class="form-control" required>
                            <label for="edit_author">Author: </label>
                            <input type="text" name="edit_author" id="edit_author" class="form-control" required>
                            <label for="edit_date">Date : </label>
                            <input type="date" name="edit_date" id="edit_date" class="form-control" required>
                            <label for="edit_pub">Publisher : </label>
                            <input type="text" name="edit_pub" id="edit_pub" class="form-control" required>
                            <label for="edit_genre">Genre</label>
                            <select type="text" name="edit_genre" id="edit_genre" class="form-control" required>
                                <option value="Romance">Romance</option>
                                <option value="Comedy">Comedy</option>
                                <option value="Drama">Drama</option>
                            </select>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" name="edit_save" id="edit_save">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Edit Modal -->
    </div>

</body>
</html>

<?php include "ajax.php" ?>