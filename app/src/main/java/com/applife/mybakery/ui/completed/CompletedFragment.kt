package com.applife.mybakery.ui.completed

import android.os.Bundle
import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.fragment.app.Fragment
import androidx.lifecycle.ViewModelProvider
import com.applife.mybakery.databinding.FragmentCompletedBinding

class CompletedFragment :Fragment() {
    private var _binding: FragmentCompletedBinding? = null
    // Это свойство действует только между onCreateView и onDestroyView

    private val binding get() = _binding!!

    override fun onCreateView(
        inflater: LayoutInflater,
        container: ViewGroup?,
        savedInstanceState: Bundle?
    ): View {
        val completedViewModel =
            ViewModelProvider(this).get(CompletedViewModel::class.java)

        _binding = FragmentCompletedBinding.inflate(inflater, container, false)
        val root: View = binding.root

        val textView: TextView = binding.textCompleted
        completedViewModel.text.observe(viewLifecycleOwner) {
            textView.text = it
        }
        return root
    }

    override fun onDestroyView() {
        super.onDestroyView()
        _binding = null
    }
}
