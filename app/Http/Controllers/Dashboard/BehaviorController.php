<?php

namespace App\Http\Controllers\Dashboard;

use App\Button;
use App\Chip;
use App\Http\Controllers\Controller;
use App\Image;
use App\Text;
use Illuminate\Http\Request;

class BehaviorController extends Controller
{
    public function save(Request $request, $type, $id)
    {

        $request->validate([
            'behavioral_model' => 'required',
            'content1' => 'required'
        ]);

        $widget = null;
        switch ($type) {
            case 'button':
                $widget = Button::find($id);
                break;
            case 'chip':
                $widget = Chip::find($id);
                break;
            case 'text':
                $widget = Text::find($id);
                break;
            case 'image':
                $widget = Image::find($id);
                break;
            default:
                abort('404');
        }

        if (!$widget) {
            // abort('404');
        }

        //dd($widget->behavior);

        if(!$widget->behavior){
            $widget->behavior()->create([
                'behavioral_model' => request('behavioral_model'),
                'content1' => request('content1'),
                'content2' => request('content2') ? request('content2') : "",
            ]);
        }else{
            $widget->behavior()->update([
                'behavioral_model' => request('behavioral_model'),
                'content1' => request('content1'),
                'content2' => request('content2') ? request('content2') : "",
            ]);
        }

        return back()->with('status','Comportamiento asignado con éxito');
    }
}
