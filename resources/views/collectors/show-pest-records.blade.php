@section('title', 'Pest record')
<x-app-layout>
    
    <table class="table-auto">
        <thead>
            <tr>

                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        Pest Name

                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 01

                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 02

                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 03
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 04
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 05
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 06
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 07
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 08
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 09
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        L - 10
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        Total
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        Mean(%)
                    </div>
                </th>
                <th scope="col" class="py-2 px-2">
                    <div class="flex items-center">
                        Code
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>

            @if (!empty($pests) && $pests->count())
                @php
                    
                    $tillers = 0;
                @endphp
                @foreach ($pests as $row)
                    @if ($row->pest_name == 'Tillers')
                        @php
                            $tillers = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                        @endphp
                        <tr>

                            <th class ="py-2 px-2 text-left">{{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $tillers }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'Thrips')
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ '-' }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'Gall Midge')
                        @php
                            $code = 0;
                            $silvershot = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                            $silvershot_pre = round(($silvershot / $tillers) * 100, 0);
                            
                        @endphp
                        @if ($silvershot_pre == 0)
                            @php  $code=0; @endphp
                        @elseif ($silvershot_pre <= 1)
                            @php    $code=1; @endphp
                        @elseif ($silvershot_pre <= 5)
                            @php   $code=3; @endphp
                        @elseif ($silvershot_pre <= 10)
                            @php    $code=5; @endphp
                        @elseif ($silvershot_pre <= 25)
                            @php   $code=7; @endphp
                        @elseif ($silvershot_pre >= 26)
                            @php   $code=9; @endphp
                        @endif
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $silvershot }}</td>
                            <td class="py-4 px-6"> {{ $silvershot_pre }}</td>
                            <td class="py-4 px-6"> {{ $code }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'Leaf Folder')
                        @php
                            $code = 0;
                            $leaf_folder = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                            $leaf_folder_pre = round(($leaf_folder / $tillers) * 100, 0);
                            
                        @endphp
                        @if ($leaf_folder_pre == 0)
                            @php  $code=0; @endphp
                        @elseif ($leaf_folder_pre <= 5)
                            @php   $code=1;@endphp
                        @elseif ($leaf_folder_pre <= 10)
                            @php  $code=3; @endphp
                        @elseif ($leaf_folder_pre <= 20)
                            @php  $code=5; @endphp
                        @elseif ($leaf_folder_pre <= 50)
                            @php   $code=7; @endphp
                        @elseif ($leaf_folder_pre >= 51)
                            @php  $code=9; @endphp
                        @endif
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $leaf_folder }}</td>
                            <td class="py-4 px-6"> {{ $leaf_folder_pre }}</td>
                            <td class="py-4 px-6"> {{ $code }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'Yellower Stem Borer')
                        @php
                            $code = 0;
                            $yellower_stem_borer = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                            $yellower_stem_borer_pre = round(($yellower_stem_borer / $tillers) * 100, 0);
                            
                        @endphp
                        @if ($yellower_stem_borer_pre == 0)
                            @php   $code=0; @endphp
                        @elseif ($yellower_stem_borer_pre <= 1)
                            @php   $code=1; @endphp
                        @elseif ($yellower_stem_borer_pre <= 3)
                            @php   $code=3; @endphp
                        @elseif ($yellower_stem_borer_pre <= 10)
                            @php    $code=5; @endphp
                        @elseif ($yellower_stem_borer_pre <= 50)
                            @php     $code=7; @endphp
                        @else
                            @php    $code=9; @endphp
                        @endif
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $yellower_stem_borer }}</td>
                            <td class="py-4 px-6"> {{ $yellower_stem_borer_pre }}</td>
                            <td class="py-4 px-6"> {{ $code }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'BHP+WBHP')
                        @php
                            $code = 0;
                            $BHP_WBHP = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                            $BHP_WBHP_pre = round($BHP_WBHP / 50, 0);
                            
                        @endphp
                        @if ($BHP_WBHP_pre == 0)
                            @php   $code=0; @endphp
                        @elseif ($BHP_WBHP_pre <= 2)
                            @php  $code=1; @endphp
                        @elseif ($BHP_WBHP_pre <= 5)
                            @php   $code=3; @endphp
                        @elseif ($BHP_WBHP_pre <= 10)
                            @php $code = 5; @endphp
                        @elseif ($BHP_WBHP_pre <= 20)
                            @php $code=7; @endphp
                        @elseif ($BHP_WBHP_pre >= 21)
                            @php   $code=9; @endphp
                        @endif
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $BHP_WBHP }}</td>
                            <td class="py-4 px-6"> {{ $BHP_WBHP_pre }}</td>
                            <td class="py-4 px-6"> {{ $code }}</td>
                        </tr>
                    @elseif ($row->pest_name == 'Paddy Bug')
                        @php
                            $code = 0;
                            $paddy_bug = intval($row->location_one) + intval($row->location_two) + intval($row->location_three) + intval($row->location_four) + intval($row->location_five) + intval($row->location_six) + intval($row->location_seven) + intval($row->location_eight) + intval($row->location_nine) + intval($row->location_ten);
                            $paddy_bug_pre = round($paddy_bug / 10, 0);
                            
                        @endphp
                        @if ($paddy_bug_pre == 0)
                            @php $code=0;@endphp
                        @elseif ($paddy_bug_pre <= 1)
                            @php   $code=1;@endphp
                        @elseif ($paddy_bug_pre <= 4)
                            @php  $code=3;@endphp
                        @elseif ($paddy_bug_pre <= 15)
                            @php ($code = 5); @endphp
                        @elseif ($paddy_bug_pre <= 20)
                            @php   $code=7;@endphp
                        @elseif ($paddy_bug_pre >= 21)
                            @php  $code=9;@endphp
                        @endif
                        <tr>

                            <th class ="py-2 px-2 text-left">
                                {{ $row->pest_name }}</th>
                            <td class="py-4 px-6"> {{ $row->location_one }}</td>
                            <td class="py-4 px-6"> {{ $row->location_two }}</td>
                            <td class="py-4 px-6"> {{ $row->location_three }}</td>
                            <td class="py-4 px-6"> {{ $row->location_four }}</td>
                            <td class="py-4 px-6"> {{ $row->location_five }}</td>
                            <td class="py-4 px-6"> {{ $row->location_six }}</td>
                            <td class="py-4 px-6"> {{ $row->location_seven }}</td>
                            <td class="py-4 px-6"> {{ $row->location_eight }}</td>
                            <td class="py-4 px-6"> {{ $row->location_nine }}</td>
                            <td class="py-4 px-6"> {{ $row->location_ten }}</td>
                            <td class="py-4 px-6"> {{ $paddy_bug }}</td>
                            <td class="py-4 px-6"> {{ $paddy_bug_pre }}</td>
                            <td class="py-4 px-6"> {{ $code }}</td>
                        </tr>
                    @endif
                @endforeach
            @else
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endif
        </tbody>
    </table>


</x-app-layout>
