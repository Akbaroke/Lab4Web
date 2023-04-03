<?php
$id = strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/") + 1)[1] : @$_REQUEST['url'];

$sql = "SELECT * FROM data_barang WHERE id_barang = '{$id}'";
$result = mysqli_query($conn, $sql);
if (!$result) die('Error: Data tidak tersedia');
$data = mysqli_fetch_array($result);

?>

<div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700 m-auto">
  <form class="space-y-6" action="" method="post" enctype="multipart/form-data">
    <h5 class="text-xl font-medium text-gray-900 dark:text-white">Update Product</h5>
    <input type="hidden" name="id" value="<?= $data['id_barang'] ?>" />
    <div>
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
      <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name product" value="<?= $data['nama'] ?>" required>
    </div>
    <div>
      <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your kategori</label>
      <select name="kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
        <option value="">- choose -</option>
        <option <?= isSelected('Komputer', $data['kategori']) ?> value="Komputer">Komputer</option>
        <option <?= isSelected('Elektronik', $data['kategori']) ?> value="Elektronik">Elektronik</option>
        <option <?= isSelected('Handphone', $data['kategori']) ?> value="Handphone">Handphone</option>
      </select>
    </div>
    <div>
      <label for="harga_beli" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Buy</label>
      <input type="number" name="harga_beli" id="harga_beli" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="5000" value="<?= $data['harga_beli'] ?>" required>
    </div>
    <div>
      <label for="harga_jual" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price Sell</label>
      <input type="number" name="harga_jual" id="harga_jual" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="15000" value="<?= $data['harga_jual'] ?>" required>
    </div>
    <div>
      <label for="stok" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
      <input type="number" name="stok" id="stok" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="1" value="<?= $data['stok'] ?>" required>
    </div>

    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">File Image</label>
      <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="image" multiple>
    </div>

    <button type="submit" name="update" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
  </form>
</div>