package com.applife.mybakery.ui.completed

import androidx.lifecycle.LiveData
import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel

class CompletedViewModel : ViewModel() {
    private val _text = MutableLiveData<String>().apply {
        value = "Это фрагмент окна с выполненными задачами"
    }
    val text: LiveData<String> = _text
}
