package com.applife.mybakery.network

import retrofit2.Retrofit
import retrofit2.converter.scalars.ScalarsConverterFactory
import retrofit2.http.GET

// Базовый адрес URL
private const val BASE_URL = "http://c92267r3.beget.tech"

private val retrofit = Retrofit.Builder()
    .addConverterFactory(ScalarsConverterFactory.create())
    .baseUrl(BASE_URL)
    .build()

interface BakeryApiService {
    @GET("clients")
    fun getClient(): String
}

object BakeryApi {
    val retrofitService : BakeryApiService by lazy {
        retrofit.create(BakeryApiService::class.java)
    }
}