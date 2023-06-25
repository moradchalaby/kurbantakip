  <table id="example1" class="w-100 table  table-bordered table-striped">

      <thead>
          <tr>
              <th><span id='search'>MKBZ NO</span> <br>MKBZ NO</th>
              <th>HİSSE NO</th>
              <th><span id='search'>SIRA NO</span><br>SIRA NO</th>
              <th><span id='search'>KESİM NO</span><br>KESİM NO</th>
              <th><span id='search'>ADI SOYADI</span><br>ADI SOYADI</th>
              <th><span id='search'>CEP TELEFONU</span><br>CEP TELEFONU
              </th>
              <th><span id='search'>REFERANS</span><br>REFERANS</th>
              <th><span id='search'>GELECEKVEKALET</span><br>GELECEKVEKALET</th>
              <th><span id='search'>VİDEO</span><br>VİDEO</th>
              <th><span id='search'>ARAMA</span><br>ARAMA</th>
              <th>İŞLEMLER</th>

          </tr>

      </thead>
      <style>
          .transparent-input {
              background-color: rgba(0, 0, 0, 0) !important;
              border: none !important;
          }

      </style>

      <tbody id="deneme">
          @foreach ($data['buyukbas'] as $bbas)
              <form action="{{ route('buyukbas.update') }}" id="formId-{{ $bbas['id'] }}" method="post">
                  @csrf
                  <tr>
                      <input id="id-{{ $bbas['id'] }}" type="hidden" name="id" value="{{ $bbas['id'] }}">
                      <td>{{ $bbas['id'] }}

                      </td>
                      <td>{{ $bbas['hisse_no'] }}</td>
                      <td>{{ $bbas['sira_no'] }}</td>
                      <td><input id="kesimno-{{ $bbas['id'] }}" type="number" onchange="ajaxa({{ $bbas['id'] }});"
                              class=" w-100 transparent-input" name=" kesim_no" value="{{ $bbas['kesilme_no'] }}">

                      </td>
                      <td>{{ $bbas['adi_soyadi'] }}</td>

                      <td><input id="tel-{{ $bbas['id'] }}" type="tel" class="w-100 transparent-input " name="tel_no"
                              value=" {{ $bbas['tel_no'] }}">
                          <a class="btn btn-success"><i class="fab fa-whatsapp"></i></a>
                          <a hreff="tel:+90{{ $bbas['tel_no'] }}" class="btn btn-info"><i
                                  class="fas fa-phone"></i></a>
                      </td>
                      <td>{{ $bbas['referans'] }}</td>
                      <td>@php  echo $bbas['vekalet_durum']==0?'Gelecek':'Vekalet'  @endphp</td>
                      <td>
                          <select id="video-{{ $bbas['id'] }}" name="video_durum"
                              onchange="alert(this.value)"" class=" transparent-input">
                              <option value="0">GÖNDERİLMEDİ</option>
                              <option value="10">KENDİSİNE GÖNDERİLDİ</option>
                              <option value="11">REFERANSA GÖNDERİLDİ</option>
                              <option value="2">WHATSAPP YOK</option>

                          </select>
                          {{ $bbas['video_durum'] }}
                      </td>
                      <td>{{ $bbas['arama_durum'] }}
                          <select id="arama-{{ $bbas['id'] }}" name="arama_durum" class="transparent-input">
                              <option value="0">ARANMADI</option>
                              <option value="10">ARANDI</option>
                              <option value="11">ULAŞILAMADI</option>
                              <option value="12">NUMARA YANLIŞ</option>
                              <option value="13">REFERANS ARANDI</option>


                          </select>
                      </td>
                      <td> <a class="btn btn-primary"><i class="far fa-edit"></i></a>
                      </td>
                  </tr>
              </form>
          @endforeach
      </tbody>

  </table>
