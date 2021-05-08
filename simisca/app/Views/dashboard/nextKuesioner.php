<?= $this->extend('template/dashboard/index'); ?>
<?= $this->section('content'); ?>
            <div class="menu-content">
                <div>
                    <h2>Sensus Mitigasi dan Kesiapsiagaan Terhadap Bencana Satuan Kerja Badan Pusat Statistik (BPS) di Seluruh Indonesia</h2>
                </div>
                <div id="progress">
                    <div  class="label">
                        <span>Progress Pengisian</span>
                    </div>
                    <div id="progress-bar">
                        <div id="progress-fill"></div>
                    </div>
                    <div id="percent">
                        <span id="changePercent">10%</span>
                    </div>
                </div>
                <div class="index">
                    <div class="label">
                       <span>Index Pertanyaan</span>
                    </div>
                    <div>
                        <select name="blok" id="blok">
                            <option value="">BLOK 1</option>
                            <option value="">BLOK 2</option>
                            <option value="">BLOK 3</option>
                            <option value="">BLOK 4</option>            
                        </select>
                    </div> 
                </div>
                <div class="questionaire">
                    <div class="boxwrapper">
                        <div class="box">
                            <div class="head">
                                BLOK 1 Keterangan Satuan Kerja BPS
                            </div>
                            <div class="body">
                                <div class="rows">
                                    <div class="column1">
                                        <div class="question">
                                            Satuan Kerja
                                        </div>
                                        <div class="info">
                                            <button class="info-button"><i class="fas fa-question-circle"></i> Penjelasan</button>
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <select name="answers" class="dropdown">
                                            <option value="">BPS Pusat</option>
                                            <option value="">BPS Provinsi</option>
                                            <option value="">BPS Kabupaten/Kota</option>
                                            <option value="">Politeknik Statistika STIS</option>            
                                        </select>
                                    </div>
                                </div>
                                <div class="space"></div>
                                <div class="rows">
                                    <div class="column1">
                                        <div class="question">
                                            Provinsi
                                        </div>
                                        <div class="info">
                                            <button class="info-button"><i class="fas fa-question-circle"></i> Penjelasan</button>
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <select name="answers" class="dropdown">
                                            <option value="">DKI Jakarta</option>
                                            <option value="">Jawa Barat</option>
                                            <option value="">Kalimantan Timur</option>
                                            <option value="">Sulawesi Selatan</option>            
                                        </select>
                                    </div>
                                </div>
                                <div class="space"></div>
                                <div class="rows">
                                    <div class="column1">
                                        <div class="question">
                                            Kabupaten/Kota
                                        </div>
                                        <div class="info">
                                            <button class="info-button"><i class="fas fa-question-circle"></i> Penjelasan</button>
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <select name="answers" class="dropdown">
                                            <option value="">Kuningan</option>
                                            <option value="">Cirebon</option>            
                                        </select>
                                    </div>
                                </div>
                                <div class="space"></div>
                                <div class="rows">
                                    <div class="column1">
                                        <div class="question">
                                            Kecamatan
                                        </div>
                                        <div class="info">
                                            <button class="info-button"><i class="fas fa-question-circle"></i> Penjelasan</button>
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <select name="answers" class="dropdown">
                                            <option value="">Kuningan</option>           
                                        </select>
                                    </div>
                                </div>
                                <div class="space"></div>
                            </div>    
                        </div>
                    </div>
                    <div class="icon">
                        <div class="buttons">
                            <button type="submit" id="saved-task" class="btn">
                                <i class="fas fa-save fa-2x"></i>
                            <span class="text-button">LANJUTKAN NANTI</span>
                            </button>
                        </div>
                        <div class="buttons">
                            <button type="submit" id="completed-task" class="btn">
                                <i class="fas fa-paper-plane fa-2x"></i>
                                <span class="text-button">SUBMIT</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
<?= $this->endSection(); ?>