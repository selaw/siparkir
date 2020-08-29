Pilih Siswa : 
<select name="id_peralatan" id="id_peralatan">
    <?php
    if(count($siswa->result_array())>0)
    {
        echo "<option>-Pilih-</option>";
        foreach($peralatan->result_array() as $k)
        {
        echo "<option value='".$k['id_siswa']."'>".$k['peralatan']."</option>";
        }
    }
    else{
        echo "<option>- Data Belum Tersedia -</option>";
    }
    ?>
</select>