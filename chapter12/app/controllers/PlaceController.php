<?php

use App\Transformer\CheckinTransformer;
use App\Transformer\PlaceTransformer;

class PlaceController extends ApiController
{
    public function index()
    {
        $places = Place::take(10)->get();

        return $this->respondWithCollection($places, new PlaceTransformer);
    }

    public function show($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }
        
        return $this->respondWithItem($place, new PlaceTransformer);
    }

    public function getCheckins($userId)
    {
        $user = User::find($userId);

        if (! $user) {
            return $this->errorNotFound('User not found');
        }

        return $this->respondWithCollection($user->checkins, new CheckinTransformer);
    }

    public function uploadImage($placeId)
    {
        $place = Place::find($placeId);

        if (! $place) {
            return $this->errorNotFound('Place not found');
        }

        exit('This would normally upload an image somewhere but that is hard.');
    }
}
