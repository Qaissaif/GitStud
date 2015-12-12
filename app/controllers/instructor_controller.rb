class InstructorController < ApplicationController
	layout "inner_layout"

	def dashboard
		@assignments=@current_instructor.assignments
	end

	def assignments
	end

	
end