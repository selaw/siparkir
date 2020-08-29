<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('temp/header');
  $this->load->view('temp/layout');
  $this->load->view('temp/sidebar_petugas');
?>

        <div class="main-content">
                <section class="section">
                  <div class="section-header">
                <h1 class="page-head-line" >Data Parkir</h1> &nbsp; &nbsp; <?= $this->session->flashdata('flash'); ?>
            </div>

   <div class="section-body">  
    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 line" >
                            <div class="panel panel-default">
                                <div class="x_content">
                                    <br />
                                   <form id="demo-form2" method="post" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('petugas/parkir'); ?>">

                                        <div class="form-group">
                                            <input type="hidden" name="no_parkir" class="form-control"  value="<?= $kode; ?>"  readonly>
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> No Polisi <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="no_polisi" required="required" class="form-control col-md-7 col-xs-12">
                                                 <?= form_error('no_polisi',' <small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>
                                        
                                          <?php
                                        $tgl = date(" Y-m-d h:i:s a",time()+60*60*6);

                                        ?>
                                          <input type="hidden" name="tanggal" readonly class="form-control col-md-7 col-xs-12" value="<?= $tgl; ?>">
                                            
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Jenis Kendaraan <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                 <select class="form-control" name="id_jeniskendaraan" id="id_jeniskendaraan">
                                                    <option value="0" selected="selected">--Pilih Jenis--</option>
                                                     <?php foreach($jenis_kendaraan as $j) : ?>
                                                    <option value="<?= $j['id_jeniskendaraan']; ?>"><?= $j['jenis_kendaraan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?= form_error('id_jeniskendaraan',' <small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Parkir / Target <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <select class="form-control" name="id_target" id="id_target">
                                                    <option value="0" selected="selected">--Pilih Jenis--</option>
                                                     <?php foreach($target as $t) : ?>
                                                    <option value="<?= $t['id_target']; ?>"><?= $t['target']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?= form_error('id_target',' <small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Pelaratan / Tempat <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <select class="form-control" name="id_peralatan" id="id_peralatan">
                                                    <option value="0" selected="selected">--Pilih Jenis Peralatan--</option>
                                                     <?php foreach($peralatan as $p) : ?>
                                                    <option value="<?= $p['id_peralatan'];?>"><?= $p['peralatan']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?= form_error('id_peralatan',' <small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name"> Lokasi <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <select class="form-control" name="id_lokasi" id="id_lokasi">
                                                    <option value="0" selected="selected">--Pilih Lokasi--</option>
                                                     <?php foreach($lokasi as $l) : ?>
                                                    <option value="<?= $l['id_lokasi']; ?>"><?= $l['lokasi']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                             <?= form_error('id_lokasi',' <small class="text-danger pl-3">','</small>'); ?>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                                <button type="submit" name="save" class="btn btn-success" title="Tambah Target Baru">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

<div class="row">
                <div class="col-md-12">
                     <!--    Hover Rows  -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Kode Parkir</th>
                                            <th>Nomor Polisi</th>
                                            <th>Tanggal</th>
                                            <th>Kendaraan</th>
                                            <th>Jenis Parkir</th>
                                            <th width="130">Tempat </th>
                                            <th>Lokasi</th>
                                            <th width="120">Retribusi</th>
                                        </tr>
                                    </thead>                                   
                                    <tbody>
                                        <?php foreach($parkir as $p) : ?>
                                        <tr>
                                            <?php if ($p['id_target']==1) {
                                                $p['id_target']="Khusus";
                                            } elseif($p['id_target']==2){
                                               $p['id_target']="Umum";
                                            }else{$p['id_jeniskendaraan']="Tidak Terdaftar";
                                            }

                                            if ($p['id_jeniskendaraan']==1) {
                                                $p['id_jeniskendaraan']="Roda 4";
                                            } elseif($p['id_jeniskendaraan']==2){
                                                $p['id_jeniskendaraan']="Roda 2";
                                            }else{$p['id_jeniskendaraan']="Tidak Terdaftar";
                                            } ?>
                                            <td><?php echo $p['no_parkir']; ?></td>
                                            <td><?php echo $p['no_polisi']; ?></td>
                                            <td><?php echo $p['tanggal']; ?></td>
                                            <td><?php echo $p['id_jeniskendaraan']; ?></td>
                                            <td><?php echo $p['id_target']; ?></td>
                                            <td><?php echo $p['id_peralatan']; ?></td>
                                            <td><?php echo $p['id_lokasi']; ?></td>
                                            <td><?php echo "Rp. ".number_format($p['retribusi']); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End  Hover Rows  -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php $this->load->view('temp/footer'); ?>