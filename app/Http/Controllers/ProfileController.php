<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\PortfolioImage;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function uploadPortfolioImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension = $image->extension();
            $filename = "portfolio_" . time() . '.' . $extension;
            $image->move(public_path('uploads/portfolio_images'), $filename);
        } else {
            $filename = 'default.jpg'; 
        }
        
        PortfolioImage::create([
            'user_id' => Auth::id(),
            'image' => $filename,
        ]);
        
        
       

        return redirect()->route('profile.edit')->with('success', 'تم رفع الصورة بنجاح.');
    }

    public function deletePortfolioImage($id)
    {
        $image = PortfolioImage::findOrFail($id);

        if ($image->user_id !== Auth::id()) {
            return redirect()->route('profile.edit')->with('error', 'ليس لديك صلاحية لحذف هذه الصورة.');
        }

        Storage::delete('public/portfolio_images/' . $image->image);
        $image->delete();

        return redirect()->route('profile.edit')->with('success', 'تم حذف الصورة بنجاح.');
    }
}
