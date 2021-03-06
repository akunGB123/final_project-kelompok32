@extends('layouts.master')

@section('head_title')
    Detail Pertanyaan - {{$pertanyaan->judul}}
@endsection

@section('konten')
    <div class="card shadow mb-4">
        <div class="card-header bg-info text-light">
            <h4>Detail Pertanyaan</h4>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-1">
                    Judul
                </div>
                <div class="col-11">
                    : {{$pertanyaan->judul}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Isi
                </div>
                <div class="col-11">
                    :
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    {!! $pertanyaan->isi !!}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Tag
                </div>
                <div class="col-11">
                    :
                    @foreach ($tag as $t)
                        <button class="btn btn-success ml-1">{{$t}}</button>
                    @endforeach
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-1">
                    Poin
                </div>
                <div class="col-11">
                    : {{$pertanyaan->poin_vote}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    Dibuat pada
                </div>
                <div class="col-10">
                    : {{$pertanyaan->created_at}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    Diperbarui pada
                </div>
                <div class="col-10">
                    : {{$pertanyaan->updated_at}}
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-2">
                    Jawaban Tepat
                </div>
                <div class="col-10">
                    :
                </div>
            </div>
            <div class="card mb-3">
                @if($jawaban_tepat == null)
                    <div class="card-body">
                        <h6>Belum ada jawaban yang terpilih</h6>
                    </div>
                @else
                    <div class="card-body">
                        {!! $jawaban_tepat->isi !!}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-secondary text-light">
            <h5>Jawaban yang tersimpan</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if(count($jawaban) == 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Belum ada jawaban yang tersimpan</th>
                            </tr>
                        </thead>
                    </table>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jawaban</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jawaban as $j)
                                <tr>
                                    <td>
                                        {!! $j->isi !!}
                                    </td>
                                    <td>
                                        <form action="/detail-pertanyaan/{{$pertanyaan->id}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <input type="hidden" name="id_jawabanTepat" value="{{$j->id}}">
                                            <button type="submit" class="btn btn-success">Jadikan Jawaban Tepat</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>

    <a href="/detail-pertanyaan" class="btn btn-warning">Kembali</a>
@endsection
