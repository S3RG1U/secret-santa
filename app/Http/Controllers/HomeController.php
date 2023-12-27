<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Elf;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $elf = Elf::where('ip', $request->ip())
            ->where('user_agent', $request->header('User-Agent'))
            ->first();

        return view('welcome', compact('elf'));
    }

    public function congrats()
    {
        return view('congrats.index');
    }

    public function check(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|unique:elves|max:255|string',
        ]);

        $name = $validated['name'];
        $ip = $request->ip();
        $userAgent = $request->header('User-Agent');

        $request->session()->put('name', $name);

        $elf = Elf::where('ip', $ip)
            ->where('user_agent', $userAgent)
            ->first();

        if ($elf) {
            $elf->increment('attempts');
        } else {
            Elf::create([
                'name' => $name,
                'ip' => $ip,
                'user_agent' => $userAgent,
                'method' => $request->method(),
                'url' => $request->url(),
                'full_url' => $request->fullUrl(),
                'referrer' => $request->header('referer'),
                'path' => $request->path(),
                'host' => $request->getHost(),
                'port' => $request->getPort(),
                'locale' => $request->getLocale(),
                'language' => $request->getPreferredLanguage(),
                'is_secure' => $request->secure(),
                'is_ajax' => $request->ajax(),
                'content_type' => $request->getContentType(),
                'session_data' => json_encode($request->session()->all()),
                'cookies' => json_encode($request->cookies->all()),
                'headers' => json_encode($request->header()),
                'attempts' => 1
            ]);
        }

        if (in_array($name, ['Cara Gabriela', 'Gabriela Cara', 'Cara Gaby', 'Gaby Cara'])) {
            return redirect()->route('congrats');
        }

        return redirect()->back();
    }
}
