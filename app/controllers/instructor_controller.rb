class InstructorController < ApplicationController
	layout "inner_layout"

	def dashboard
		@assignments=@user.student_or_instructor.assignments
	end

	def assignments
	end

	
end
