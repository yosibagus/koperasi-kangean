<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerServiceRequest;
use App\Mail\AccountSuspended;
use App\Mail\UserCreate;
use App\Models\Admin\Profile;
use App\Models\Teller\Pegadaian;
use App\Models\Teller\PembayaranPegadaian;
use App\Models\Teller\PembayaranPinjaman;
use App\Models\Teller\Pinjaman;
use App\Models\Teller\Rekening;
use App\Models\Teller\Tabungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CustomerService extends Controller
{
    public function index()
    {
        // if(auth()->user()->profile_id != 1) {
        //     $user_id = auth()->user()->id;
        //     $data = [
        //         'tellers' => User::where('role', 'teller')->where('status', 'aktif')->where('profile_id', $user_id)->with('profile')->get(),
        //         'admins' => User::where('role', 'admin')->where('status', 'aktif')->where('profile_id', $user_id)->with('profile')->get(),
        //         'operators' => User::where('role', 'operator')->where('status', 'aktif')->where('profile_id', $user_id)->with('profile')->get(),
        //         'ditangguhkan' => User::where('status', 'nonaktif')->where('profile_id', $user_id)->with('profile')->get(),
        //         'anggotas' => User::where('role', 'anggota')->where('status', 'aktif')->where('profile_id', $user_id)->with('profile')->get(),
        //     ];
        // }else{
        //     $data = [
        //         'tellers' => User::where('role', 'teller')->where('status', 'aktif')->with('profile')->get(),
        //         'admins' => User::where('role', 'admin')->where('status', 'aktif')->with('profile')->get(),
        //         'operators' => User::where('role', 'operator')->where('status', 'aktif')->with('profile')->get(),
        //         'ditangguhkan' => User::where('status', 'nonaktif')->with('profile')->get(),
        //         'anggotas' => User::where('role', 'anggota')->where('status', 'aktif')->with('profile')->get(),
        //     ];
        // }

        $data = [
            'customer_services' => User::with('profile')->where('status', 'aktif')->where('profile_id', Session::get('bank'))->get(),
            'ditangguhkan' => User::with('profile')->where('status', 'nonaktif')->where('profile_id', Session::get('bank'))->get(),
        ];
        return view('admin.customer-service.cs-view', $data);
    }

    public function create()
    {
        return view('admin.customer-service.cs-create');
    }

    public function store(CustomerServiceRequest $request)
    {
        $token = Str::random(32);
        $name = $request->name;
        $file = $request->file('foto_user');
        $fileName = $token . '.' . $file->getClientOriginalExtension();
        $email = $request->email;
        $contact = $request->contact;
        $profile_id = Session::get('bank');
        $role = $request->role;
        $password = '123';
        $otp = mt_rand(000000, 999999);

        User::create([
            'token_user' => $token,
            'name' => $name,
            'email' => $email,
            'email_verified_at' => now(),
            'otp' => $otp,
            'password' => bcrypt($password),
            'foto_user' => $fileName,
            'profile_id' => $profile_id,
            'role' => $role,
            'status' => 'aktif',
        ]);

        Mail::to($email)->send(new UserCreate($password, $email));

        $file->move('images/user', $fileName);

        return redirect()->route('customer-service.index')->with('success', 'Customer Service berhasil ditambahkan.');
    }

    public function edit(User $customer_service)
    {
        return view('admin.customer-service.cs-edit', compact('customer_service'));
    }

    public function update(CustomerServiceRequest $request, User $customer_service)
    {
        $data = $request->only(['name', 'email', 'role']);
        $data['profile_id'] = auth()->user()->profile_id;

        if ($request->hasFile('foto_user')) {
            // Delete old file
            File::delete('images/user/' . $customer_service->foto_user);

            // Upload new file
            $file = $request->file('foto_user');
            $fileName = Str::random(32) . '.' . $file->getClientOriginalExtension();
            $file->move('images/user', $fileName);
            $data['foto_user'] = $fileName;
        }

        $customer_service->update($data);

        return redirect()->route('customer-service.index')->with('success', 'Customer Service berhasil diperbarui.');
    }

    public function destroy(User $customer_service)
    {
        if($customer_service->role == 'anggota') {
            $rekening = Rekening::where('anggota', $customer_service->id)->first();
            if ($rekening) {
                return redirect()->back()->with([
                    'service' => "Customer Service ini tidak dapat dihapus masih memiliki data yang terkait dengan rekening",
                    'token' => $customer_service->token_user,
                ]);
            }
        }

        $relatedDataCount = Rekening::where('teller', $customer_service->id)->count() +
                            Tabungan::where('_teller', $customer_service->id)->count() +
                            Pinjaman::where('_teller', $customer_service->id)->count() +
                            PembayaranPinjaman::where('__teller', $customer_service->id)->count() +
                            Pegadaian::where('_teller', $customer_service->id)->count() +
                            PembayaranPegadaian::where('__teller', $customer_service->id)->count();

        if ($relatedDataCount > 0) {
            return redirect()->route('customer-service.index')->with([
                'service' => "Customer Service ini tidak dapat dihapus masih memiliki data yang terkait dengan rekening, tabungan, pinjaman, pembayaran",
                'token' => $customer_service->token_user,
            ]);
        } else {
            File::delete('images/user/' . $customer_service->foto_user);
            $customer_service->delete();
            return redirect()->route('customer-service.index')->with('success', 'Customer Service berhasil dihapus.');
        }
    }

}
