class StudentController < ApplicationController
	layout "inner_layout"
	def dashboard
		@repositories=@user.student_or_instructor.repositories
		@assignments=Assignment.all
		#log_file_name = '/var/gitfiles/qais'
		#unless File.exist?(log_file_name)
	#		Delayed::Job.enqueue(CreateRepository.new(log_file_name))
	#	end
	end

	def repositories
		@repositories=@user.student_or_instructor.repositories
	end

	def assignments
	end


end
