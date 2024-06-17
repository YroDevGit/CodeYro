<div class="table-responsive">

                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Id</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Assigned</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Assignee</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Priority</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Budget</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Action</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(isset($projects)): ?> 
                        
                        <?php foreach($projects as $proj): ?>
                            <tr>
                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0"><?= $proj->ID; ?></h6></td>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?= $proj->project; ?></h6>
                            <span class="fw-normal"></span>                          
                        </td>
                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?= $proj->assignee; ?></p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <?php
                            $pr = $proj->priority;
                            $prl = "";
                            $class = "";
                            if($pr==1){
                              $prl ="Low";
                              $class = "bg-primary";
                            }
                            if($pr==2){
                              $prl ="High";
                              $class = "bg-warning";
                            }
                            if($pr==3){
                              $prl ="Most priority";
                              $class = "bg-danger";
                            }
                            ?>
                            <span class="badge badger <?= $class  ?>  rounded-3 fw-semibold"><?= $prl;?></span>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4"><?= "₱".$proj->budget; ?></h6>
                        </td>
                        <td class="border-bottom-0">
                          <a href="/crud/delete?q=<?= $proj->ID; ?>" onclick="return confirm('Are you sure to delete selected data?')"><button class='btn btn-danger'>&#128465;</button></a>
                          <a><button onclick="
                          document.getElementById('tupdate').style.display='';
                          setValue('project', '<?= $proj->project ?>');
                          setValue('assignee', '<?= $proj->assignee ?>');
                          setValue('budget', '<?= $proj->budget ?>');
                          setValue('id', '<?= $proj->ID ?>');
                          " class='btn btn-primary'>&#9998;</button></a>
                        </td>
                      </tr>
                        <?php endforeach; ?>
                     <?php endif; ?>                    
                    </tbody>
                  </table>
                </div>


                
             
                <div id="tupdate" align="center" style="display:none;">
                  <div class="todal-body">
                    <div align="right" class="for-close"><span onclick="closeTupdate()">X</span></div>
                    <div class="todal-header">
                            <h3>EDIT PROJECT</h3>
                    </div>
                    <div class="todal-content">
                    <div align="left">
                        <form action="<?= site_url('crud/editProject') ?>" method="post">
                          <input type="hidden" id="id" name="id">
                          <div class="mb-3">
                            <label for="" class="form-label">Project name</label>
                            <input type="text" name="project" id="project" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Assignee</label>
                            <input type="text" name="assignee" id="assignee" class="form-control">
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Priority</label>
                            <select name="priority" class='form-control' id="">
                                <option value="1">Low</option>
                                <option value="2">High</option>
                                <option value="3">Most priority</option>
                            </select>
                            <div id="emailHelp" class="form-text"></div>
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Budget</label>
                            <input type="text" name="budget" id="budget" class="form-control">
                          </div>
                          <div class="mb-3" align="right">
                            <button class="btn btn-primary">SAVE</button>
                          </div>
                        </form>
                    </div>
                    </div>
                  </div>
                </div>

               

              