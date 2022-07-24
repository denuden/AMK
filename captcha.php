	<!-- 2ND COL -->

	<!-- For adding captcha/ -- test page --  -->
    <?php include 'php/global/head-tag.php'?>
    </head>
    <body>
    <div class="col">
					<h1>Add Product</h1><hr>
					<form enctype="multipart/form-data" id="uploadForm">
						
						<div class="mx-auto my-auto">
							
							<div class="g-col mt-3">
								<label>Product Name:</label>
								<input  name="name" />

								<label>Product code:</label>
								<input name="code" />
							</div>
		

						</div> <br>

						<img id="image" src="images/200.png" width="100px" class="img-thumbnail" alt="..."><br>
						<input type="file" oninput="image.src=window.URL.createObjectURL(this.files[0])" name="file" id="file"> <br>
						<input class="mt-3" type="submit" name="submit" value="Input Product">

					</form>
				</div>
                <script src="php/config/captcha-test.js"></script>
    </body>
    </html>
    