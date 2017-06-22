 @if(count($cost_data))

              <div class="example table-responsive">
                  <table class="table table-striped " >
                    <thead>
                      <tr>
                        <th>Cost Code</th>
                        <th>
                          Description
                          <small></small>
                        </th>
                        @if($template->level == 4)
                        <th>
                          BASIS
                          <small>Estmated Cost</small>
                        </th>
                        @endif
                        <th>
                          QTY/DAYS
                          <small>Estmated Cost</small>
                        </th>
                        <th>
                          UNIT PRICE
                          <small>Estmated Cost</small>
                        </th>
                        <th>
                          TOTAL PRICE
                          <small>Estmated Cost</small>
                        </th>
                        <th>
                          QTY/DAYS
                          <small>Actual Cost</small>
                        </th>
                        <th>
                          UNIT PRICE
                          <small>Actual Cost</small>
                        </th>
                        <th>
                          TOTAL PRICE
                          <small>Actual Cost</small>
                        </th>
                      </tr>
                    </thead>
                    <tbody>

                  @for($i=0; $i<=count($cost_data['estimated'])-1; $i++)

                      <tr>
                        <td>{{$cost_data['estimated'][$i]->code}}</td>
                        <td>{{$cost_data['estimated'][$i]->description}}</td>
                        @if($template->level == 4)
                        <td>{{($cost_data['estimated'][$i]->basis)}}</td>
                        @endif
                        <td>{{($cost_data['estimated'][$i]->qty_days)}}</td>
                        <td>{{($cost_data['estimated'][$i]->unit_price)}}</td>
                        <td>{{($cost_data['estimated'][$i]->total_price)}}</td>
                        <td>{{($cost_data['actual'][$i]->qty_days)}}</td>
                        <td>{{($cost_data['actual'][$i]->unit_price)}}</td>
                        <td>{{($cost_data['actual'][$i]->total_price)}}</td>
                      </tr>

                  @endfor

                    </tbody>
                  </table>
                </div>
                 
                @else

                  <span style="font-size:25px"> No Data Available</span>

                @endif