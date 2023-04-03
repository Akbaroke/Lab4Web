<?php
$sql = 'SELECT * FROM data_barang';
$result = mysqli_query($conn, $sql);
?>

<button type="button" onclick="window.location.href='create'" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Add Product</button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          No.
        </th>
        <th scope="col" class="px-6 py-3">
          Image
        </th>
        <th scope="col" class="px-6 py-3">
          Name
        </th>
        <th scope="col" class="px-6 py-3">
          Category
        </th>
        <th scope="col" class="px-6 py-3">
          Price Buy
        </th>
        <th scope="col" class="px-6 py-3">
          Price Sell
        </th>
        <th scope="col" class="px-6 py-3">
          Stock
        </th>
        <th scope="col" class="px-6 py-3">
          Action
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($result) {
        $i = 1;
        while ($row = mysqli_fetch_array($result)) {
      ?>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?= $i ?>.
            </th>
            <td class="px-6 py-4">
              <a href="assets/images/<?= $row['gambar'] ?>" target="_blank">
                <img src="assets/images/<?= $row['gambar'] ?>" alt="<?= $row['nama'] ?>" class="w-10 h-10 rounded-md">
              </a>
            </td>
            <td class="px-6 py-4">
              <?= $row['nama'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $row['kategori'] ?>
            </td>
            <td class="px-6 py-4">
              <?= formatRupiah($row['harga_beli']) ?>
            </td>
            <td class="px-6 py-4">
              <?= formatRupiah($row['harga_jual']) ?>
            </td>
            <td class="px-6 py-4">
              <?php if ($row['stok'] <= 0) {
                echo '<span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Sold Out</span>';
              } else {
                echo $row['stok'];
              }  ?>
            </td>
            <td class="px-6 py-4 text-right flex gap-2">
              <a href="update/<?= $row['id_barang'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
              <a href="delete/<?= $row['id_barang'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
            </td>
          </tr>
        <?php $i++;
        }
      } else {
        ?>
        <div>
          <p>Data is Empty.</p>
        </div>
      <?php } ?>
    </tbody>
  </table>
</div>